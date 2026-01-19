<x-admin-layout>
    <div class="space-y-8">
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-indigo-50/50 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-2xl font-black text-slate-800 tracking-tight">Ringkasan Statistik</h1>
                <p class="text-slate-500 text-sm mt-1">Selamat datang kembali di panel monitoring, <span class="text-indigo-600 font-bold">{{ auth()->user()->name }}</span>.</p>
            </div>
            <div class="absolute right-0 top-0 opacity-10 translate-x-1/4 -translate-y-1/4">
                <i class="fa-solid fa-chart-pie text-[150px] text-indigo-500"></i>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Total Mahasiswa</p>
                        <h3 class="text-3xl font-black text-slate-800 mt-2">{{ $totalMahasiswa }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center group-hover:bg-blue-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-user-graduate text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-bold text-green-500 bg-green-50 w-fit px-2 py-1 rounded-lg">
                    <i class="fa-solid fa-arrow-up mr-1"></i> Aktif
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Laporan Masuk</p>
                        <h3 class="text-3xl font-black text-slate-800 mt-2">{{ $totalLaporan }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-file-invoice text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-bold text-indigo-500 bg-indigo-50 w-fit px-2 py-1 rounded-lg">
                    <i class="fa-solid fa-clock mr-1"></i> {{ $laporanPending }} Perlu Validasi
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Presensi</p>
                        <h3 class="text-3xl font-black text-slate-800 mt-2">{{ $totalLaporan }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-calendar-check text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex items-center text-xs font-bold text-emerald-600">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full mr-2 animate-pulse"></span> Jurnal Terdata
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Asal Kampus</p>
                        <h3 class="text-3xl font-black text-slate-800 mt-2">{{ $asalKampus }}</h3>
                    </div>
                    <div class="w-12 h-12 bg-orange-50 text-orange-500 rounded-2xl flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-building-columns text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-xs font-bold text-slate-400">Universitas & Politeknik</div>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-lg font-black text-slate-800">Laporan Jurnal Terbaru</h3>
                    <p class="text-sm text-slate-500">Memerlukan peninjauan dan validasi pembimbing</p>
                </div>
                <a href="{{ route('admin.jurnal.index') }}" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-all w-fit">
                    Lihat Semua Laporan
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Mahasiswa</th>
                            <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Kegiatan</th>
                            <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400 text-center">Status</th>
                            <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($recentReports as $report)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold">
                                        {{ substr($report->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">{{ $report->user->name }}</p>
                                        <p class="text-[10px] text-slate-400 font-bold">{{ $report->user->universitas ?? 'Tanpa Instansi' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <p class="text-sm text-slate-600 leading-relaxed max-w-xs truncate">{{ $report->kegiatan }}</p>
                            </td>
                            <td class="px-8 py-5 text-center">
                                @if($report->status == 'pending')
                                    <span class="px-3 py-1 bg-amber-50 text-amber-600 text-[10px] font-black rounded-lg uppercase">Pending</span>
                                @elseif($report->status == 'approved' || $report->status == 'disetujui')
                                    <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-black rounded-lg uppercase">Approved</span>
                                @else
                                    <span class="px-3 py-1 bg-rose-50 text-rose-600 text-[10px] font-black rounded-lg uppercase">Rejected</span>
                                @endif
                            </td>
                            <td class="px-8 py-5 text-right">
                                <a href="{{ route('admin.jurnal.index') }}" class="p-2 text-indigo-500 hover:bg-indigo-50 rounded-lg transition-all" title="Lihat Detail"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-10 text-center text-slate-400 text-sm italic">Belum ada laporan masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>