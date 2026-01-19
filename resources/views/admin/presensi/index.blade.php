<x-admin-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-black text-slate-800 tracking-tighter uppercase">Rekap Presensi Mahasiswa</h1>
        <p class="text-slate-500 font-medium">Pantau kehadiran mahasiswa PKL di Kominfo Binjai secara real-time.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-emerald-500 p-6 rounded-[24px] text-white shadow-lg shadow-emerald-200">
            <p class="text-[10px] font-black uppercase opacity-80 tracking-widest">Hadir Hari Ini</p>
            <h3 class="text-3xl font-black mt-1">{{ $presensis->where('created_at', '>=', today())->count() }}</h3>
        </div>
        <div class="bg-white p-6 rounded-[24px] border border-slate-100 shadow-sm">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Record</p>
            <h3 class="text-3xl font-black text-slate-800 mt-1">{{ $presensis->count() }}</h3>
        </div>
    </div>

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest">Mahasiswa</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-center">Waktu Masuk</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-center">Waktu Pulang</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($presensis as $presensi)
                <tr class="hover:bg-slate-50/30 transition-colors">
                    <td class="p-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-100 text-[#4e5ecf] rounded-xl flex items-center justify-center font-black uppercase shadow-sm">
                                {{ substr($presensi->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-800">{{ $presensi->user->name }}</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">{{ $presensi->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-6 text-center">
                        <span class="px-4 py-2 bg-indigo-50 text-[#4e5ecf] rounded-xl font-black text-xs border border-indigo-100">
                            <i class="fa-solid fa-right-to-bracket mr-1 text-[10px]"></i>
                            {{ $presensi->jam_masuk ?? '--:--' }}
                        </span>
                    </td>
                    <td class="p-6 text-center">
                        <span class="px-4 py-2 bg-slate-50 text-slate-400 rounded-xl font-black text-xs border border-slate-100">
                            <i class="fa-solid fa-right-from-bracket mr-1 text-[10px]"></i>
                            {{ $presensi->jam_pulang ?? '--:--' }}
                        </span>
                    </td>
                    <td class="p-6">
                        @php
                            $isTerlambat = $presensi->jam_masuk > '08:00';
                        @endphp
                        @if($isTerlambat)
                            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-lg text-[10px] font-black uppercase tracking-widest">Terlambat</span>
                        @else
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-lg text-[10px] font-black uppercase tracking-widest">Tepat Waktu</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-20 text-center">
                        <div class="flex flex-col items-center">
                            <i class="fa-solid fa-clock-rotate-left text-5xl text-slate-200 mb-6"></i>
                            <h3 class="text-xl font-black text-slate-800">Belum Ada Data</h3>
                            <p class="text-slate-400 max-w-md mx-auto mt-2 font-medium">Belum ada log kehadiran masuk dan pulang mahasiswa yang tercatat hari ini.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>