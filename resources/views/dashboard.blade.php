<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
                <div>
                    <h2 class="text-3xl font-black text-slate-800 tracking-tight uppercase">
                        Dashboard <span class="text-indigo-600">Mahasiswa</span>
                    </h2>
                    <p class="text-slate-500 font-medium mt-1 italic">
                        Selamat datang kembali, <span class="text-indigo-600 font-bold">{{ Auth::user()->name }}</span> di Portal E-Laporan PKL.
                    </p>
                </div>
                <div class="flex items-center gap-3 bg-white p-2 rounded-2xl shadow-sm border border-slate-100">
                    <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-100">
                        <i class="fa-solid fa-user-graduate text-xl"></i>
                    </div>
                    <div class="pr-4">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Status Peserta</p>
                        <p class="text-sm font-bold text-slate-700 mt-1">Mahasiswa Aktif</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 relative overflow-hidden group">
                            <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-50 rounded-full group-hover:scale-110 transition-transform"></div>
                            <div class="relative">
                                <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Total Jurnal</p>
                                <div class="flex items-end gap-3">
                                    <span class="text-5xl font-black text-slate-800">{{ $data['total'] }}</span>
                                    <span class="text-xs font-bold text-slate-400 mb-2 underline decoration-indigo-500 uppercase">Berkas</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 relative overflow-hidden group">
                            <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-50 rounded-full group-hover:scale-110 transition-transform"></div>
                            <div class="relative">
                                <p class="text-[11px] font-black text-emerald-600 uppercase tracking-[0.2em] mb-4">Disetujui</p>
                                <div class="flex items-end gap-3">
                                    <span class="text-5xl font-black text-emerald-600">{{ $data['disetujui'] }}</span>
                                    <span class="text-xs font-bold text-slate-400 mb-2 uppercase">Valid</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-xl shadow-slate-200/50 relative overflow-hidden group">
                            <div class="absolute -right-4 -top-4 w-24 h-24 bg-amber-50 rounded-full group-hover:scale-110 transition-transform"></div>
                            <div class="relative">
                                <p class="text-[11px] font-black text-amber-600 uppercase tracking-[0.2em] mb-4">Pending</p>
                                <div class="flex items-end gap-3">
                                    <span class="text-5xl font-black text-amber-500">{{ $data['pending'] }}</span>
                                    <span class="text-xs font-bold text-slate-400 mb-2 uppercase">Review</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-indigo-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-indigo-200 relative overflow-hidden">
                        <div class="absolute right-0 bottom-0 opacity-10">
                            <i class="fa-solid fa-paper-plane text-[150px] -rotate-12 translate-y-10"></i>
                        </div>
                        <div class="relative">
                            <h3 class="text-xl font-bold mb-2 text-indigo-100 uppercase tracking-wider">Akses Cepat Jurnal</h3>
                            <p class="text-indigo-300 text-sm mb-8 max-w-md">Perbarui jurnal harian Anda secara rutin untuk mempermudah monitoring oleh pembimbing lapangan.</p>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <a href="{{ route('reports.create') }}" class="flex items-center justify-between p-4 bg-white/10 backdrop-blur-md rounded-2xl hover:bg-white/20 transition group border border-white/10">
                                    <span class="font-bold text-sm tracking-wide">Buat Laporan Baru</span>
                                    <i class="fa-solid fa-plus-circle group-hover:translate-x-1 transition-transform"></i>
                                </a>
                                <a href="{{ route('reports.index') }}" class="flex items-center justify-between p-4 bg-white/10 backdrop-blur-md rounded-2xl hover:bg-white/20 transition group border border-white/10">
                                    <span class="font-bold text-sm tracking-wide">Lihat Riwayat</span>
                                    <i class="fa-solid fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500">
                                <i class="fa-solid fa-circle-info"></i>
                            </div>
                            <h4 class="font-black text-slate-800 uppercase tracking-widest text-xs">Informasi Sistem</h4>
                        </div>
                        
                        <ul class="space-y-4">
                            <li class="flex items-start gap-4">
                                <div class="w-2 h-2 rounded-full bg-indigo-500 mt-1.5"></div>
                                <p class="text-xs text-slate-500 leading-relaxed font-medium">Jangan lupa untuk melakukan <span class="text-slate-800 font-bold underline decoration-indigo-300">Cetak PDF</span> di akhir bulan sebagai lampiran fisik.</p>
                            </li>
                            <li class="flex items-start gap-4">
                                <div class="w-2 h-2 rounded-full bg-indigo-500 mt-1.5"></div>
                                <p class="text-xs text-slate-500 leading-relaxed font-medium">Pastikan deskripsi kegiatan jelas dan mencakup tugas yang dikerjakan hari ini.</p>
                            </li>
                        </ul>

                        <hr class="my-6 border-slate-50">

                        <div class="bg-slate-50 rounded-2xl p-4">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1 text-center">Periode Laporan</p>
                            <p class="text-center font-bold text-slate-700 text-sm italic">{{ now()->startOfMonth()->translatedFormat('d M') }} — {{ now()->endOfMonth()->translatedFormat('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="text-center px-4">
                        <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.4em] mb-2 text-center">Dinas Kominfo Binjai</p>
                        <p class="text-[9px] text-slate-400 font-medium text-center">Sistem Monitoring Magang v1.0</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>