<x-admin-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-black text-slate-800 tracking-tighter uppercase">Rekap Presensi Mahasiswa</h1>
        <p class="text-slate-500 font-medium">Pantau kehadiran mahasiswa PKL di Kominfo Binjai secara real-time.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-emerald-500 rounded-[32px] p-8 text-white shadow-lg shadow-emerald-100 relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] opacity-80 mb-1">Hadir Hari Ini</p>
                <h3 class="text-5xl font-black tracking-tighter">{{ $presensis->where('tanggal', date('Y-m-d'))->count() }}</h3>
            </div>
            <i class="fa-solid fa-users text-9xl absolute -right-4 -bottom-4 opacity-10"></i>
        </div>
        <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm relative overflow-hidden">
            <div class="relative z-10">
                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-1">Total Record</p>
                <h3 class="text-5xl font-black tracking-tighter text-slate-800">{{ $presensis->count() }}</h3>
            </div>
            <i class="fa-solid fa-database text-9xl absolute -right-4 -bottom-4 text-slate-50"></i>
        </div>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest w-16">No</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest">Mahasiswa</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-center">Waktu Masuk</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-center">Waktu Pulang</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($presensis as $attendance)
                <tr class="hover:bg-slate-50/30 transition-colors">
                    <td class="p-6 text-sm font-bold text-slate-400">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-100 text-[#4e5ecf] rounded-xl flex items-center justify-center font-black uppercase text-xs">
                                {{ substr($attendance->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-800">{{ $attendance->user->name }}</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">
                                    {{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="p-6 text-center">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-indigo-50 text-[#4e5ecf] rounded-lg">
                            <i class="fa-solid fa-right-to-bracket text-[10px]"></i>
                            <span class="text-[10px] font-black">{{ $attendance->jam_masuk ?? '--:--' }}</span>
                        </div>
                    </td>
                    <td class="p-6 text-center">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-slate-50 text-slate-400 rounded-lg">
                            <i class="fa-solid fa-right-from-bracket text-[10px]"></i>
                            <span class="text-[10px] font-black">{{ $attendance->jam_pulang ?? '--:--' }}</span>
                        </div>
                    </td>
                    <td class="p-6 text-center">
                        @if($attendance->status == 'tepat waktu')
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-lg text-[10px] font-black uppercase tracking-widest">Tepat Waktu</span>
                        @else
                            <span class="px-3 py-1 bg-rose-100 text-rose-600 rounded-lg text-[10px] font-black uppercase tracking-widest">Terlambat</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-20 text-center">
                        <div class="flex flex-col items-center">
                            <i class="fa-solid fa-calendar-xmark text-4xl text-slate-200 mb-4"></i>
                            <p class="text-slate-400 font-bold italic">Belum ada data presensi.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>