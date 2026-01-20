<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\Admin\AdminController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- GUEST ROUTE ---
Route::get('/', function () {
    return view('welcome');
});

// --- DASHBOARD ROUTE (MAHASISWA) ---
Route::get('/dashboard', [ReportController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// --- AUTHENTICATED ROUTES ---
Route::middleware('auth')->group(function () {
    
    // --- PROFILE MANAGEMENT ---
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    /**
     * --- REPORT / JURNAL MANAGEMENT ---
     */
    Route::get('/reports/export-pdf', [ReportController::class, 'exportPdf'])->name('reports.export-pdf');
    Route::resource('reports', ReportController::class);

    // --- MENU KATEGORI: AKTIVITAS ---
    Route::get('/statistik', [ReportController::class, 'statistik'])->name('statistik.index');
    
    // --- FITUR PRESENSI (SISI MAHASISWA) ---
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
    Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');

    // --- MENU KATEGORI: INFORMASI ---
    Route::view('/pengumuman', 'pengumuman')->name('pengumuman.index');
    Route::view('/panduan', 'panduan')->name('panduan.index');
    Route::view('/pembimbing', 'pembimbing')->name('pembimbing.index');

    // ==========================================================
    // --- KHUSUS ROUTE ADMIN (LENGKAP) ---
    // ==========================================================
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Halaman Statistik/Dashboard Admin (Mengarah ke AdminController)
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        
        // --- MANAJEMEN DATA MAHASISWA ---
        Route::get('/students', [AdminController::class, 'students'])->name('students.index');
        Route::get('/students/create', [AdminController::class, 'createStudent'])->name('students.create');
        Route::post('/students', [AdminController::class, 'storeStudent'])->name('students.store');
        Route::get('/students/{id}/edit', [AdminController::class, 'editStudent'])->name('students.edit');
        Route::put('/students/{id}', [AdminController::class, 'updateStudent'])->name('students.update');
        Route::delete('/students/{id}', [AdminController::class, 'destroyStudent'])->name('students.destroy');

        // --- MANAJEMEN VALIDASI JURNAL ---
        Route::get('/jurnal', [AdminController::class, 'validasiJurnal'])->name('jurnal.index');
        Route::patch('/jurnal/{id}/approve', [AdminController::class, 'approveJurnal'])->name('jurnal.approve');
        Route::patch('/jurnal/{id}/reject', [AdminController::class, 'rejectJurnal'])->name('jurnal.reject');

        // --- MANAJEMEN REKAP PRESENSI ---
        Route::get('/presensi', [AdminController::class, 'rekapPresensi'])->name('presensi.index');
        
        // --- FITUR BARU: EXCEL EXPORT (OPSIONAL) ---
        Route::get('/presensi/export', [AdminController::class, 'exportPresensi'])->name('presensi.export');
    });
});

require __DIR__.'/auth.php';