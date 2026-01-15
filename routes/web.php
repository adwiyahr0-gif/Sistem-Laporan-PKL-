<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PresensiController; // Tambahkan ini
use Illuminate\Support\Facades\Route;

// --- GUEST ROUTE ---
Route::get('/', function () {
    return view('welcome');
});

// --- DASHBOARD ROUTE ---
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
    
    // --- FITUR PRESESI (DIPERBARUI) ---
    // Sekarang menggunakan Controller, bukan Route::view lagi
    Route::get('/presensi', [PresensiController::class, 'index'])->name('presensi.index');
    Route::post('/presensi', [PresensiController::class, 'store'])->name('presensi.store');

    // --- MENU KATEGORI: INFORMASI ---
    Route::view('/pengumuman', 'pengumuman')->name('pengumuman.index');
    Route::view('/panduan', 'panduan')->name('panduan.index');
    Route::view('/pembimbing', 'pembimbing')->name('pembimbing.index');
});

require __DIR__.'/auth.php';