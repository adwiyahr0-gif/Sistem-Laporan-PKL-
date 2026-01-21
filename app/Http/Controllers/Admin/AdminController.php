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
        
        // Tambahan untuk statistik chart
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
     * Menampilkan daftar mahasiswa
     */
    public function students()
    {
        $students = User::where('role', 'mahasiswa')->latest()->get();
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
        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    /**
     * ==========================================================
     * FITUR VALIDASI JURNAL
     * ==========================================================
     */

    public function validasiJurnal()
    {
        $reports = Report::with('user')->latest()->get();
        return view('admin.jurnal.index', compact('reports'));
    }

    /**
     * Mengubah status laporan menjadi APPROVED
     */
    public function approveJurnal($id)
    {
        $report = Report::findOrFail($id);
        
        try {
            // Bypass constraint untuk SQLite agar pasti tersimpan
            DB::statement('PRAGMA ignore_check_constraints = ON');
            $report->update(['status' => 'approved']);
            DB::statement('PRAGMA ignore_check_constraints = OFF');

            return redirect()->route('admin.jurnal.index')->with('success', 'Laporan harian berhasil disetujui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyetujui laporan. Pastikan database Anda mendukung status "approved".');
        }
    }

    /**
     * Mengubah status laporan menjadi REJECTED dengan alasan
     */
    public function rejectJurnal(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        
        // Ambil alasan dari input form/prompt
        $reason = $request->input('rejection_reason', 'Data tidak sesuai / kurang lengkap');

        try {
            DB::statement('PRAGMA ignore_check_constraints = ON');
            $report->update([
                'status' => 'rejected',
                'rejection_reason' => $reason // Simpan alasannya
            ]);
            DB::statement('PRAGMA ignore_check_constraints = OFF');

            return redirect()->route('admin.jurnal.index')->with('success', 'Laporan harian mahasiswa telah ditolak.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menolak laporan.');
        }
    }

    /**
     * ==========================================================
     * FITUR REKAP PRESENSI
     * ==========================================================
     */

    public function rekapPresensi()
    {
        $presensis = Presensi::with('user')->latest()->get();
        return view('admin.presensi.index', compact('presensis'));
    }
}