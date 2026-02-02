<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report; 
use App\Models\Presensi; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Halaman Dashboard Admin
     */
    public function index()
    {
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        $totalLaporan = Report::count();
        $laporanPending = Report::where('status', 'pending')->count();
        
        // Disinkronkan untuk menghitung baik 'approved' maupun 'disetujui'
        $laporanApproved = Report::whereIn('status', ['approved', 'disetujui'])->count();
        $laporanRejected = Report::where('status', 'rejected')->count();
        
        $asalKampus = User::where('role', 'mahasiswa')->distinct('universitas')->count('universitas');
        
        $recentReports = Report::with('user')->latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalMahasiswa', 
            'totalLaporan', 
            'laporanPending',
            'laporanApproved',
            'laporanRejected',
            'asalKampus',
            'recentReports'
        ));
    }

    /**
     * Menampilkan daftar mahasiswa (DENGAN PAGINATION & SEARCH)
     */
    public function students(Request $request)
    {
        $search = $request->get('search');

        // Menambahkan filter pencarian berdasarkan nama
        $students = User::where('role', 'mahasiswa')
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.student.index', compact('students'));
    }

    /**
     * Form tambah mahasiswa
     */
    public function createStudent()
    {
        return view('admin.student.create');
    }

    /**
     * Menyimpan data mahasiswa baru
     */
    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'universitas' => 'nullable|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'universitas' => $request->universitas,
            'role' => 'mahasiswa',
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Mahasiswa baru berhasil ditambahkan!');
    }

    /**
     * Form edit mahasiswa
     */
    public function editStudent($id)
    {
        $student = User::where('role', 'mahasiswa')->findOrFail($id);
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Update data mahasiswa
     */
    public function updateStudent(Request $request, $id)
    {
        $student = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'universitas' => 'nullable|string|max:255',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'universitas' => $request->universitas,
        ];

        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed|min:8']);
            $data['password'] = Hash::make($request->password);
        }

        $student->update($data);

        return redirect()->route('admin.students.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Hapus data mahasiswa
     */
    public function destroyStudent($id)
    {
        $student = User::findOrFail($id);
        
        try {
            Report::where('user_id', $student->id)->delete();
            Presensi::where('user_id', $student->id)->delete();
            $student->delete();

            return redirect()->route('admin.students.index')->with('success', 'Mahasiswa dan seluruh data terkait berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus mahasiswa: ' . $e->getMessage());
        }
    }

    /**
     * ==========================================================
     * FITUR VALIDASI JURNAL (DENGAN PAGINATION & SEARCH)
     * ==========================================================
     */
    public function validasiJurnal(Request $request)
    {
        $search = $request->get('search');

        // Mengambil data dengan filter pencarian nama mahasiswa
        $reports = Report::with('user')
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // Menjaga parameter ?search saat pindah page pagination

        return view('admin.jurnal.index', compact('reports'));
    }

    /**
     * Mengubah status laporan menjadi DISETUJUI
     */
    public function approveJurnal($id)
    {
        $report = Report::findOrFail($id);
        
        try {
            DB::statement('PRAGMA ignore_check_constraints = ON');
            $report->update(['status' => 'disetujui']); 
            DB::statement('PRAGMA ignore_check_constraints = OFF');

            return redirect()->route('admin.jurnal.index')->with('success', 'Laporan harian berhasil disetujui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyetujui laporan.');
        }
    }

    /**
     * Mengubah status laporan menjadi REJECTED dengan alasan
     */
    public function rejectJurnal(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        
        $reason = $request->input('rejection_reason', 'Data tidak sesuai / kurang lengkap');

        try {
            DB::statement('PRAGMA ignore_check_constraints = ON');
            $report->update([
                'status' => 'rejected',
                'rejection_reason' => $reason 
            ]);
            // DB::statement('PRAGMA ignore_check_constraints = OFF'); // Sesuai kode asli Anda

            return redirect()->route('admin.jurnal.index')->with('success', 'Laporan harian mahasiswa telah ditolak.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menolak laporan.');
        }
    }

    /**
     * ==========================================================
     * FITUR REKAP PRESENSI (DENGAN PAGINATION & SEARCH)
     * ==========================================================
     */
    public function rekapPresensi(Request $request)
    {
        $search = $request->get('search');

        // Menampilkan data absen dengan filter pencarian nama
        $presensis = Presensi::with('user')
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.presensi.index', compact('presensis'));
    }

    /**
     * ==========================================================
     * FITUR KELOLA ADMIN
     * ==========================================================
     */
    public function manageAdmin()
    {
        $admins = User::where('role', 'admin')->latest()->get();
        return view('admin.manage', compact('admins'));
    }

    /**
     * Form tambah admin baru
     */
    public function createAdmin()
    {
        return view('admin.manage_create');
    }

    /**
     * Simpan data admin baru
     */
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin',
            ]);

            return redirect()->route('admin.manage')->with('success', 'Admin baru berhasil didaftarkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mendaftarkan admin: ' . $e->getMessage());
        }
    }

    /**
     * Hapus data admin
     */
    public function destroyAdmin($id)
    {
        $admin = User::where('role', 'admin')->findOrFail($id);
        
        if (auth()->id() == $admin->id) {
            return redirect()->back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
        }

        try {
            $admin->delete();
            return redirect()->route('admin.manage')->with('success', 'Akun admin berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}