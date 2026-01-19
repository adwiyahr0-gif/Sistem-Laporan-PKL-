<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Menampilkan Dashboard Utama Admin (Statistik)
     */
    public function index()
    {
        // 1. Menghitung total mahasiswa
        $totalMahasiswa = User::where('role', 'mahasiswa')->count();
        
        // 2. Menghitung total laporan yang masuk
        $totalLaporan = Report::count();
        
        // 3. Menghitung laporan yang masih pending
        $laporanPending = Report::where('status', 'pending')->count();

        /**
         * 4. Menghitung total Universitas
         */
        $totalUniversitas = User::where('role', 'mahasiswa')
                                ->whereNotNull('universitas')
                                ->distinct('universitas')
                                ->count('universitas');

        // 5. Mengambil 5 laporan terbaru untuk ditampilkan di tabel dashboard
        $recentReports = Report::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalMahasiswa', 
            'totalLaporan', 
            'laporanPending', 
            'totalUniversitas', 
            'recentReports'
        ));
    }

    /**
     * Menampilkan Daftar Lengkap Mahasiswa
     */
    public function students()
    {
        $students = User::where('role', 'mahasiswa')
                        ->orderBy('name', 'asc')
                        ->get();

        return view('admin.students.index', compact('students'));
    }

    /**
     * TAMPILAN: Form Tambah Mahasiswa
     */
    public function createStudent()
    {
        return view('admin.students.create');
    }

    /**
     * PROSES: Simpan Mahasiswa Baru
     */
    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'universitas' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'universitas' => $request->universitas,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa', // Set otomatis sebagai mahasiswa
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    /**
     * TAMPILAN: Form Edit Mahasiswa
     */
    public function editStudent($id)
    {
        $student = User::where('role', 'mahasiswa')->findOrFail($id);
        return view('admin.students.edit', compact('student'));
    }

    /**
     * PROSES: Update Data Mahasiswa
     */
    public function updateStudent(Request $request, $id)
    {
        $student = User::where('role', 'mahasiswa')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'universitas' => 'required|string|max:255',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->universitas = $request->universitas;

        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }

        $student->save();

        return redirect()->route('admin.students.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    /**
     * PROSES: Hapus Mahasiswa
     */
    public function destroyStudent($id)
    {
        $student = User::where('role', 'mahasiswa')->findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }

    /**
     * Fungsi opsional: Melihat detail satu mahasiswa
     */
    public function showStudent($id)
    {
        $student = User::where('role', 'mahasiswa')->findOrFail($id);
        return view('admin.students.show', compact('student'));
    }
}