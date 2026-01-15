<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /**
     * Menampilkan Dashboard dengan Statistik Asli
     */
    public function dashboard()
    {
        $userId = Auth::id();
        
        // Menghitung data asli dari database
        $data = [
            'total'     => Report::where('user_id', $userId)->count(),
            'disetujui' => Report::where('user_id', $userId)->where('status', 'disetujui')->count(),
            'pending'   => Report::where('user_id', $userId)->where('status', 'pending')->count(),
        ];

        return view('dashboard', compact('data'));
    }

    public function index()
    {
        $reports = Report::where('user_id', Auth::id())
                        ->orderBy('tanggal', 'desc')
                        ->get();

        return view('reports.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal'  => 'required|date',
            'kegiatan' => 'required|string|min:10',
        ]);

        Report::create([
            'user_id'  => Auth::id(),
            'tanggal'  => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'status'   => 'pending',
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil ditambahkan!');
    }

    public function update(Request $request, Report $report)
    {
        if ($report->user_id !== Auth::id()) { abort(403); }

        $request->validate([
            'tanggal'  => 'required|date',
            'kegiatan' => 'required|string|min:10',
        ]);

        $report->update($request->only('tanggal', 'kegiatan'));

        return redirect()->route('reports.index')->with('success', 'Laporan diperbarui!');
    }

    public function destroy(Report $report)
    {
        if ($report->user_id !== Auth::id()) { abort(403); }
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Laporan dihapus!');
    }

    public function exportPdf()
    {
        $reports = Report::where('user_id', Auth::id())->orderBy('tanggal', 'asc')->get();
        $pdf = Pdf::loadView('reports.pdf', compact('reports'))->setPaper('a4', 'portrait');
        return $pdf->download('Laporan_PKL_Kominfo_' . Auth::user()->name . '.pdf');
    }
}