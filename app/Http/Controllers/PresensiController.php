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
     * Menampilkan halaman utama presensi dengan data real-time.
     */
    public function index(): View
    {
        $userId = Auth::id();
        
        // Memastikan waktu menggunakan zona Jakarta (WIB)
        $now = Carbon::now('Asia/Jakarta');
        $today = $now->toDateString();
        
        // 1. Ambil data presensi user hari ini
        $presensiHariIni = Presensi::where('user_id', $userId)
                                   ->where('tanggal', $today)
                                   ->first();

        // 2. Ambil riwayat 5 hari terakhir untuk sidebar/tabel bawah
        $riwayat = Presensi::where('user_id', $userId)
                           ->orderBy('tanggal', 'desc')
                           ->take(5)
                           ->get();

        // 3. Hitung ringkasan bulanan dengan validasi tahun & bulan berjalan
        $ringkasan = [
            'hadir' => Presensi::where('user_id', $userId)
                                ->whereMonth('tanggal', $now->month)
                                ->whereYear('tanggal', $now->year)
                                ->where('status', 'Hadir')
                                ->count(),
            'terlambat' => Presensi::where('user_id', $userId)
                                    ->whereMonth('tanggal', $now->month)
                                    ->whereYear('tanggal', $now->year)
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
        
        // Memastikan waktu simpan menggunakan zona Jakarta (WIB)
        $now = Carbon::now('Asia/Jakarta');
        $today = $now->toDateString();

        // --- LOGIKA ABSEN MASUK ---
        if ($request->type === 'masuk') {
            // Cek duplikasi agar tidak bisa double absen masuk
            $exists = Presensi::where('user_id', $userId)->where('tanggal', $today)->exists();
            if ($exists) {
                return back()->with('error', 'Opps! Anda sudah melakukan absen masuk hari ini.');
            }

            // Aturan jam kerja: Batas 08:00 WIB
            $jamMasuk = $now->format('H:i:s');
            $status = ($now->format('H:i') > '08:00') ? 'Terlambat' : 'Hadir';

            Presensi::create([
                'user_id'   => $userId,
                'tanggal'   => $today,
                'jam_masuk' => $jamMasuk,
                'status'    => $status,
                'lokasi'    => 'Kantor Kominfo Binjai', // Info lokasi untuk Admin
            ]);

            return back()->with('success', 'Selamat bekerja! Absen masuk berhasil pada ' . $jamMasuk);
        }

        // --- LOGIKA ABSEN PULANG ---
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

            $jamPulang = $now->toTimeString();

            // Hitung durasi kerja untuk laporan Admin
            $waktuMasuk = Carbon::parse($presensi->jam_masuk);
            $durasiKerja = $waktuMasuk->diffForHumans($now, true); 

            $presensi->update([
                'jam_pulang' => $jamPulang,
                'keterangan' => 'Bekerja selama ' . $durasiKerja,
            ]);

            return back()->with('success', 'Terima kasih atas dedikasinya! Absen pulang berhasil pada ' . $now->format('H:i:s'));
        }

        return back();
    }
}