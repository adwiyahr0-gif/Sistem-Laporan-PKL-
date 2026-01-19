<x-admin-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-black text-slate-800 tracking-tighter uppercase">Validasi Jurnal Mahasiswa</h1>
        <p class="text-slate-500 font-medium">Tinjau dan berikan persetujuan atau penolakan untuk laporan kegiatan mahasiswa.</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500 text-white rounded-2xl font-bold shadow-lg shadow-emerald-200 flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-rose-500 text-white rounded-2xl font-bold shadow-lg shadow-rose-200 flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest">Mahasiswa</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest">Kegiatan</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-center">Status</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($reports as $report)
                <tr class="hover:bg-slate-50/30 transition-colors">
                    <td class="p-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-100 text-[#4e5ecf] rounded-xl flex items-center justify-center font-black uppercase">
                                {{ substr($report->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-800">{{ $report->user->name }}</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">{{ $report->user->universitas ?? 'Umum' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-6">
                        <p class="text-sm text-slate-600 leading-relaxed">{{ $report->description }}</p>
                        <p class="text-[10px] text-[#4e5ecf] mt-2 font-black uppercase tracking-tighter">
                            <i class="fa-regular fa-calendar-check mr-1"></i> {{ $report->created_at->format('d M Y') }}
                        </p>
                    </td>
                    <td class="p-6 text-center">
                        @if($report->status == 'pending')
                            <span class="px-3 py-1 bg-amber-100 text-amber-600 rounded-lg text-[10px] font-black uppercase tracking-widest">Pending</span>
                        @elseif($report->status == 'approved')
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-lg text-[10px] font-black uppercase tracking-widest">Approved</span>
                        @else
                            <span class="px-3 py-1 bg-rose-100 text-rose-600 rounded-lg text-[10px] font-black uppercase tracking-widest">Rejected</span>
                        @endif
                    </td>
                    <td class="p-6">
                        <div class="flex items-center justify-center gap-2">
                            @if($report->status == 'pending')
                                <form action="{{ route('admin.jurnal.approve', $report->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-[10px] font-black uppercase transition-all shadow-lg shadow-emerald-100">
                                        <i class="fa-solid fa-check"></i> Setujui
                                    </button>
                                </form>

                                <form action="{{ route('admin.jurnal.reject', $report->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-rose-500 hover:bg-rose-600 text-white rounded-xl text-[10px] font-black uppercase transition-all shadow-lg shadow-rose-100">
                                        <i class="fa-solid fa-xmark"></i> Tolak
                                    </button>
                                </form>
                            @elseif($report->status == 'approved')
                                <div class="flex items-center gap-2 text-emerald-500 font-black text-[10px] uppercase">
                                    <i class="fa-solid fa-circle-check text-lg"></i> Terverifikasi
                                </div>
                            @else
                                <div class="flex items-center gap-2 text-rose-500 font-black text-[10px] uppercase">
                                    <i class="fa-solid fa-circle-xmark text-lg"></i> Ditolak
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-20 text-center">
                        <div class="flex flex-col items-center">
                            <i class="fa-solid fa-file-circle-exclamation text-4xl text-slate-200 mb-4"></i>
                            <p class="text-slate-400 font-bold italic">Belum ada laporan masuk.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>