<x-app-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Analisis Statistik</h2>
        <p class="text-slate-500 text-sm">Pantau performa dan progres kegiatan magang Anda secara real-time.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Total Jam</p>
            <div class="flex items-end gap-2 mt-2">
                <h3 class="text-2xl font-black text-slate-800">120</h3>
                <span class="text-slate-400 text-xs mb-1">Jam</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Efektivitas</p>
            <div class="flex items-end gap-2 mt-2">
                <h3 class="text-2xl font-black text-indigo-600">92%</h3>
            </div>
        </div>
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Sisa Hari</p>
            <div class="flex items-end gap-2 mt-2">
                <h3 class="text-2xl font-black text-rose-500">12</h3>
                <span class="text-slate-400 text-xs mb-1">Hari</span>
            </div>
        </div>
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm">
            <p class="text-slate-400 text-xs font-bold uppercase tracking-wider">Poin Bonus</p>
            <div class="flex items-end gap-2 mt-2">
                <h3 class="text-2xl font-black text-emerald-500">450</h3>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm relative overflow-hidden">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 relative z-10">
                    <div>
                        <span class="text-[10px] font-bold text-indigo-500 uppercase tracking-[0.2em]">Capaian Saat Ini</span>
                        <h3 class="text-4xl font-black text-slate-800 mt-1">85% <span class="text-lg font-medium text-slate-400 tracking-normal">Terselesaikan</span></h3>
                    </div>
                    
                    <div class="flex-1 w-full max-w-md space-y-4">
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-slate-500 uppercase">Laporan Disetujui</span>
                                <span class="text-indigo-600">10 / 12</span>
                            </div>
                            <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-indigo-500 rounded-full shadow-sm shadow-indigo-200" style="width: 85%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs font-bold mb-2">
                                <span class="text-slate-500 uppercase">Kehadiran</span>
                                <span class="text-emerald-600">15 / 20 Hari</span>
                            </div>
                            <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-emerald-500 rounded-full shadow-sm shadow-emerald-200" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-indigo-50 rounded-full blur-3xl opacity-50"></div>
            </div>

            <div class="bg-white p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Grafik Aktivitas Mingguan</h3>
                <div class="h-64 flex items-end justify-between gap-2 px-4">
                    <div class="flex flex-col items-center gap-2 w-full group">
                        <div class="w-full bg-slate-50 rounded-t-xl group-hover:bg-indigo-100 transition-all h-32 relative">
                            <div class="absolute bottom-0 w-full bg-indigo-400 rounded-t-xl" style="height: 60%"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400">SEN</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 w-full group">
                        <div class="w-full bg-slate-50 rounded-t-xl group-hover:bg-indigo-100 transition-all h-32 relative">
                            <div class="absolute bottom-0 w-full bg-indigo-400 rounded-t-xl" style="height: 85%"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400">SEL</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 w-full group">
                        <div class="w-full bg-slate-50 rounded-t-xl group-hover:bg-indigo-100 transition-all h-32 relative">
                            <div class="absolute bottom-0 w-full bg-indigo-600 rounded-t-xl" style="height: 100%"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400">RAB</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 w-full group">
                        <div class="w-full bg-slate-50 rounded-t-xl group-hover:bg-indigo-100 transition-all h-32 relative">
                            <div class="absolute bottom-0 w-full bg-indigo-400 rounded-t-xl" style="height: 40%"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400">KAM</span>
                    </div>
                    <div class="flex flex-col items-center gap-2 w-full group">
                        <div class="w-full bg-slate-50 rounded-t-xl group-hover:bg-indigo-100 transition-all h-32 relative">
                            <div class="absolute bottom-0 w-full bg-indigo-400 rounded-t-xl" style="height: 75%"></div>
                        </div>
                        <span class="text-[10px] font-bold text-slate-400">JUM</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-gradient-to-br from-indigo-600 to-violet-700 p-6 rounded-[2rem] text-white shadow-xl shadow-indigo-200">
                <h3 class="font-bold text-sm mb-4">Pencapaian Anda</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-3 bg-white/10 p-3 rounded-2xl border border-white/10">
                        <div class="w-10 h-10 bg-amber-400 rounded-xl flex items-center justify-center text-xl shadow-lg shadow-amber-500/20">
                            <i class="fa-solid fa-trophy"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold">Mahasiswa Teladan</p>
                            <p class="text-[10px] text-indigo-100">Presensi 100% Minggu ini</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 bg-white/10 p-3 rounded-2xl border border-white/10 opacity-50">
                        <div class="w-10 h-10 bg-slate-400 rounded-xl flex items-center justify-center text-xl">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold">Penulis Jurnal</p>
                            <p class="text-[10px] text-indigo-100">Selesaikan 30 Laporan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <h3 class="font-bold text-slate-800 text-sm mb-4">Aktivitas Terakhir</h3>
                <div class="space-y-6 relative before:absolute before:left-2 before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-50">
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1 w-4 h-4 bg-emerald-500 rounded-full border-4 border-white shadow-sm"></div>
                        <p class="text-xs font-bold text-slate-700">Laporan Ke-10 Disetujui</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">2 jam yang lalu</p>
                    </div>
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1 w-4 h-4 bg-indigo-500 rounded-full border-4 border-white shadow-sm"></div>
                        <p class="text-xs font-bold text-slate-700">Absen Masuk: 08:00 AM</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Hari ini</p>
                    </div>
                    <div class="relative pl-8">
                        <div class="absolute left-0 top-1 w-4 h-4 bg-slate-200 rounded-full border-4 border-white shadow-sm"></div>
                        <p class="text-xs font-bold text-slate-700">Mengunggah Laporan Baru</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">Kemarin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>