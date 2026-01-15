<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * DASHBOARD: Menampilkan ringkasan data di halaman utama
     */
    public function dashboard()
    {
        $userId = Auth::id();
        
        // Menyiapkan data untuk widget statistik di dashboard
        $data = [
            'total'     => Report::where('user_id', $userId)->count(),
            'disetujui' => Report::where('user_id', $userId)->where('status', 'disetujui')->count(),
            'pending'   => Report::where('user_id', $userId)->where('status', 'pending')->count(),
        ];

        return view('dashboard', compact('data'));
    }

    /**
     * INDEX: Daftar semua laporan
     */
    public function index()
    {
        $reports = Report::where('user_id', Auth::id())->latest()->get();
        return view('reports.index', compact('reports'));
    }

    /**
     * CREATE & STORE: Form tambah laporan
     */
    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required|string|min:5',
            'tanggal' => 'required|date',
        ]);

        Report::create([
            'user_id' => Auth::id(),
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal,
            'status' => 'pending', 
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil disimpan!');
    }

    /**
     * EDIT & UPDATE: Form ubah laporan
     */
    public function edit($id)
    {
        $report = Report::where('user_id', Auth::id())->findOrFail($id);
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'kegiatan' => 'required|string|min:5',
            'tanggal' => 'required|date',
        ]);

        $report->update([
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    /**
     * DESTROY: Hapus laporan
     */
    public function destroy($id)
    {
        $report = Report::where('user_id', Auth::id())->findOrFail($id);
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus!');
    }

    /**
     * STATISTIK: Data untuk grafik statistik
     */
    public function statistik()
    {
        $userId = Auth::id();
        $totalLaporan = Report::where('user_id', $userId)->count();
        $disetujui = Report::where('user_id', $userId)->where('status', 'disetujui')->count();
        $menunggu = Report::where('user_id', $userId)->where('status', 'pending')->count();
        
        $targetLaporan = 40; 
        $persentase = ($totalLaporan > 0) ? round(($totalLaporan / $targetLaporan) * 100) : 0;

        $chartData = [];
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        foreach ($days as $day) {
            $date = Carbon::parse('this ' . $day);
            $count = Report::where('user_id', $userId)->whereDate('tanggal', $date->toDateString())->count();
            $chartData[$day] = ($count > 0) ? min(($count / 5) * 100, 100) : 0;
        }

        $recentActivities = Report::where('user_id', $userId)->orderBy('tanggal', 'desc')->take(3)->get();
        return view('statistik', compact('totalLaporan', 'disetujui', 'menunggu', 'persentase', 'chartData', 'recentActivities'));
    }

    /**
     * EXPORT PDF: Cetak laporan ke file PDF
     */
    public function exportPdf()
    {
        $reports = Report::where('user_id', Auth::id())->orderBy('tanggal', 'asc')->get();
        $pdf = Pdf::loadView('reports.pdf', compact('reports'))->setPaper('a4', 'portrait');
        return $pdf->stream('Laporan_PKL_' . Auth::user()->name . '.pdf');
    }
}