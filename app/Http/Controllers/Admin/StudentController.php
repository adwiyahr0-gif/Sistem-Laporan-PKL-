<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Pastikan memanggil model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Menampilkan daftar mahasiswa
     */
    public function index()
    {
        // Mengambil user yang memiliki role 'mahasiswa'
        $students = User::where('role', 'mahasiswa')
                        ->orderBy('created_at', 'desc')
                        ->get();

        // Mengarah ke folder resources/views/admin/student/index.blade.php
        return view('admin.student.index', compact('students'));
    }

    /**
     * Menampilkan form tambah mahasiswa
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Menyimpan data mahasiswa baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa', // Set role otomatis jadi mahasiswa
        ]);

        return redirect()->route('admin.students.index')
                         ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit mahasiswa
     */
    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('admin.student.edit', compact('student'));
    }

    /**
     * Memperbarui data mahasiswa
     */
    public function update(Request $request, $id)
    {
        $student = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Jika password diisi, maka update password
        if ($request->filled('password')) {
            $request->validate(['password' => 'confirmed|min:8']);
            $student->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.students.index')
                         ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Menghapus data mahasiswa
     */
    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index')
                         ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}