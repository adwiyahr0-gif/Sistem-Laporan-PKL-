<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\Jurnal; // Sesuaikan dengan nama model jurnalmu
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today('Asia/Jakarta')->toDateString();

        // Data Jurnal Terbaru (Yang sudah ada di gambarmu)
        $latestJurnals = Jurnal::with('user')->latest()->take(5)->get();

        // DATA TIME OUT TERBARU (Section yang baru kita buat)
        $timeOutToday = Presensi::whereNotNull('jam_pulang')
            ->where('tanggal', $today)
            ->with('user')
            ->latest('updated_at')
            ->take(5)
            ->get();

        // Hitung Ringkasan Statistik
        $stats = [
            'total_mahasiswa' => \App\Models\User::where('role', 'mahasiswa')->count(),
            'laporan_masuk'   => Jurnal::whereDate('created_at', $today)->count(),
            'presensi_hadir'  => Presensi::where('tanggal', $today)->count(),
        ];

        return view('admin.dashboard', compact('latestJurnals', 'timeOutToday', 'stats'));
    }
}