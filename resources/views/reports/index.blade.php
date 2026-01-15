<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] py-8 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-7xl mx-auto mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Laporan Kegiatan Harian</h1>
                <p class="text-slate-500 mt-2 font-medium">Monitor dan kelola progres magang Anda secara sistematis.</p>
            </div>
            
            <div class="flex items-center gap-4">
                <a href="{{ route('reports.export-pdf') }}" target="_blank" class="inline-flex items-center px-5 py-3 bg-white border border-slate-200 text-slate-600 rounded-2xl text-xs font-bold uppercase tracking-wider hover:bg-slate-50 transition-all shadow-sm hover:shadow-md">
                    <i class="fa-solid fa-file-pdf mr-2 text-red-500"></i> Cetak PDF
                </a>
                <a href="{{ route('reports.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-2xl text-xs font-bold uppercase tracking-wider hover:bg-indigo-700 shadow-xl shadow-indigo-200 transition-all transform active:scale-95">
                    <i class="fa-solid fa-plus mr-2"></i> Tambah Laporan
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            @php
                $stats = [
                    ['label' => 'Total Laporan', 'value' => $reports->count(), 'icon' => 'fa-folder-open', 'color' => 'indigo', 'bg' => 'bg-indigo-50', 'text' => 'text-indigo-600'],
                    ['label' => 'Disetujui', 'value' => $reports->where('status', 'disetujui')->count(), 'icon' => 'fa-circle-check', 'color' => 'emerald', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
                    ['label' => 'Menunggu', 'value' => $reports->where('status', 'pending')->count(), 'icon' => 'fa-clock', 'color' => 'amber', 'bg' => 'bg-amber-50', 'text' => 'text-amber-600'],
                ];
            @endphp
            @foreach($stats as $stat)
            <div class="bg-white p-7 rounded-[2rem] border border-white shadow-xl shadow-slate-200/60 flex items-center gap-6 transition-transform hover:scale-[1.02]">
                <div class="w-16 h-16 {{ $stat['bg'] }} {{ $stat['text'] }} rounded-2xl flex items-center justify-center text-2xl shadow-inner">
                    <i class="fa-solid {{ $stat['icon'] }}"></i>
                </div>
                <div>
                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.15em] mb-1">{{ $stat['label'] }}</p>
                    <p class="text-3xl font-black text-slate-800">{{ $stat['value'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="max-w-7xl mx-auto bg-white/70 backdrop-blur-md rounded-[2.5rem] border border-white shadow-2xl shadow-slate-200/50 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/80 border-b border-slate-100">
                            <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest">Tanggal & Hari</th>
                            <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest">Detail Kegiatan</th>
                            <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest text-center">Status Jurnal</th>
                            <th class="px-8 py-6 text-[11px] font-black text-slate-500 uppercase tracking-widest text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($reports as $report)
                        <tr class="hover:bg-indigo-50/40 transition-colors group">
                            <td class="px-8 py-7 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="text-sm font-black text-slate-700 tracking-tight">{{ \Carbon\Carbon::parse($report->tanggal)->translatedFormat('d F Y') }}</span>
                                    <span class="text-[10px] font-bold text-indigo-400 uppercase mt-1 tracking-wider">{{ \Carbon\Carbon::parse($report->tanggal)->translatedFormat('l') }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-7">
                                <p class="text-sm text-slate-600 leading-relaxed max-w-md font-medium">
                                    {{ $report->kegiatan }}
                                </p>
                            </td>
                            <td class="px-8 py-7 text-center">
                                @if($report->status == 'disetujui')
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-emerald-100/80 text-emerald-700 text-[10px] font-black uppercase tracking-widest border border-emerald-200">
                                        <i class="fa-solid fa-check-double mr-2 text-[12px]"></i> Disetujui
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full bg-amber-100/80 text-amber-700 text-[10px] font-black uppercase tracking-widest border border-amber-200">
                                        <i class="fa-solid fa-spinner fa-spin mr-2 text-[12px]"></i> Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-7 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('reports.edit', $report->id) }}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-100 text-slate-400 hover:text-indigo-600 hover:border-indigo-100 hover:shadow-sm transition-all" title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-sm"></i>
                                    </a>
                                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Hapus laporan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-100 text-slate-400 hover:text-red-600 hover:border-red-100 hover:shadow-sm transition-all" title="Hapus">
                                            <i class="fa-solid fa-trash-can text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-24 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-20 h-20 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center text-3xl mb-6 shadow-inner">
                                        <i class="fa-solid fa-inbox"></i>
                                    </div>
                                    <p class="text-slate-400 text-sm font-bold uppercase tracking-[0.2em]">Data Kosong</p>
                                    <p class="text-slate-300 text-xs mt-2">Belum ada aktivitas yang dicatat hari ini.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>