<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PresensiController extends Controller
{
    /**
     * Menampilkan halaman utama presensi.
     */
    public function index(): View
    {
        $userId = Auth::id();
        $today = Carbon::today()->toDateString();
        
        // Mengambil data presensi user hari ini
        $presensiHariIni = Presensi::where('user_id', $userId)
                                   ->where('tanggal', $today)
                                   ->first();

        // Mengambil riwayat 5 hari terakhir untuk sidebar
        $riwayat = Presensi::where('user_id', $userId)
                           ->orderBy('tanggal', 'desc')
                           ->take(5)
                           ->get();

        // Hitung ringkasan bulanan (opsional untuk card statistik)
        $ringkasan = [
            'hadir' => Presensi::where('user_id', $userId)
                                ->whereMonth('tanggal', Carbon::now()->month)
                                ->where('status', 'Hadir')
                                ->count(),
            'terlambat' => Presensi::where('user_id', $userId)
                                    ->whereMonth('tanggal', Carbon::now()->month)
                                    ->where('status', 'Terlambat')
                                    ->count(),
        ];

        return view('presensi', compact('presensiHariIni', 'riwayat', 'ringkasan'));
    }

    /**
     * Proses simpan absen masuk dan update absen pulang.
     */
    public function store(Request $request): RedirectResponse
    {
        $userId = Auth::id();
        $today = Carbon::today()->toDateString();
        $now = Carbon::now();

        // 1. LOGIKA ABSEN MASUK
        if ($request->type === 'masuk') {
            // Cek apakah sudah ada data hari ini untuk menghindari duplikat
            $exists = Presensi::where('user_id', $userId)->where('tanggal', $today)->exists();
            if ($exists) {
                return back()->with('error', 'Anda sudah melakukan absen masuk hari ini.');
            }

            // Batas jam masuk (Contoh: 08:00)
            $jamMasuk = $now->format('H:i:s');
            $status = ($now->format('H:i') > '08:00') ? 'Terlambat' : 'Hadir';

            Presensi::create([
                'user_id'   => $userId,
                'tanggal'   => $today,
                'jam_masuk' => $jamMasuk,
                'status'    => $status,
            ]);

            return back()->with('success', 'Berhasil melakukan absen masuk pada ' . $jamMasuk);
        }

        // 2. LOGIKA ABSEN PULANG
        if ($request->type === 'pulang') {
            $presensi = Presensi::where('user_id', $userId)
                                ->where('tanggal', $today)
                                ->first();

            if (!$presensi) {
                return back()->with('error', 'Anda belum melakukan absen masuk.');
            }

            if ($presensi->jam_pulang) {
                return back()->with('error', 'Anda sudah melakukan absen pulang hari ini.');
            }

            $presensi->update([
                'jam_pulang' => $now->toTimeString(),
            ]);

            return back()->with('success', 'Berhasil melakukan absen pulang pada ' . $now->format('H:i:s'));
        }

        return back();
    }
}