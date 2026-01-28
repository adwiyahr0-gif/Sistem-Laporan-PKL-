<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    /**
     * Tampilan Dashboard Utama
     */
    public function dashboard(): View
    {
        $userId = Auth::id();
        $data = [
            'total'     => Report::where('user_id', $userId)->count(),
            'disetujui' => Report::where('user_id', $userId)->where('status', 'disetujui')->count(),
            'pending'   => Report::where('user_id', $userId)->where('status', 'pending')->count(),
        ];
        return view('dashboard', compact('data'));
    }

    /**
     * Halaman Daftar Laporan Harian (Index) - LIMIT 5 DATA
     */
    public function index(): View
    {
        $reports = Report::where('user_id', Auth::id())
                         ->latest('tanggal')
                         ->paginate(5); // Sekarang limit menjadi 5 data per halaman

        return view('reports.index', compact('reports'));
    }

    /**
     * Halaman Form Tambah Laporan
     */
    public function create(): View
    {
        return view('reports.create');
    }

    /**
     * Simpan Laporan Baru ke Database
     */
    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string|min:5',
            'tanggal'  => 'required|date',
        ]);

        Report::create([
            'user_id'  => Auth::id(),
            'kegiatan' => $request->kegiatan,
            'tanggal'  => $request->tanggal,
            'status'   => 'pending', 
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil disimpan!');
    }

    /**
     * FITUR STATISTIK: Dinamis & Formal - LIMIT 5 DATA
     */
    public function statistik(): View
    {
        $userId = Auth::id();
        
        // Mengambil laporan dengan pagination untuk tabel di bawah chart
        $reports = Report::where('user_id', $userId)
                         ->latest('tanggal')
                         ->paginate(5); // Tetap 5 data agar proporsional dengan chart

        // Persiapan data untuk Diagram Garis (7 Hari Terakhir)
        $chartData = [];
        $days = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $carbonDate = Carbon::now()->subDays($i);
            $dateString = $carbonDate->format('Y-m-d');
            
            $days[] = $carbonDate->translatedFormat('d M'); 
            
            $chartData[] = Report::where('user_id', $userId)
                                 ->whereDate('tanggal', $dateString)
                                 ->count();
        }

        return view('reports.statistik', compact('reports', 'chartData', 'days'));
    }

    /**
     * Cetak Laporan ke PDF
     */
    public function exportPdf(): Response
    {
        $user = Auth::user();
        $reports = Report::where('user_id', $user->id)
                         ->orderBy('tanggal', 'asc')
                         ->get(); // Untuk PDF tetap ambil semua data (get)

        $pdf = Pdf::loadView('reports.pdf', [
            'reports' => $reports,
            'user' => $user,
            'dateExport' => Carbon::now()->translatedFormat('d F Y')
        ]);

        $pdf->setPaper('a4', 'portrait');
        $fileName = 'Laporan_PKL_' . str_replace(' ', '_', $user->name) . '.pdf';

        return $pdf->stream($fileName);
    }

    /**
     * Halaman Edit Laporan
     */
    public function edit($id): View
    {
        $report = Report::where('user_id', Auth::id())->findOrFail($id);
        return view('reports.edit', compact('report'));
    }

    /**
     * Update Laporan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kegiatan' => 'required|string|min:5',
            'tanggal'  => 'required|date',
        ]);

        $report = Report::where('user_id', Auth::id())->findOrFail($id);
        $report->update([
            'kegiatan' => $request->kegiatan,
            'tanggal'  => $request->tanggal,
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    /**
     * Hapus Laporan
     */
    public function destroy($id)
    {
        $report = Report::where('user_id', Auth::id())->findOrFail($id);
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus!');
    }
}