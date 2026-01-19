<x-app-layout>
    <!-- Animated background particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-cyan-400 rounded-full animate-float-1" style="top: 10%; left: 10%;"></div>
        <div class="absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2" style="top: 20%; left: 80%;"></div>
        <div class="absolute w-2 h-2 bg-indigo-400 rounded-full animate-float-3" style="top: 60%; left: 15%;"></div>
        <div class="absolute w-3 h-3 bg-cyan-300 rounded-full animate-float-4" style="top: 80%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-blue-300 rounded-full animate-float-5" style="top: 40%; left: 70%;"></div>
        <div class="absolute w-4 h-4 bg-indigo-300 rounded-full animate-float-6" style="top: 70%; left: 30%;"></div>
    </div>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-slate-50 py-8 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4 animate-slide-down">
                <div>
                    <h2 class="text-4xl font-black tracking-tight uppercase">
                        <span class="text-slate-800">DASHBOARD</span> 
                        <span class="bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500 bg-clip-text text-transparent animate-gradient-flow">MAHASISWA</span>
                    </h2>
                    <p class="text-slate-500 font-medium mt-2 italic">
                        Selamat datang kembali, <span class="text-cyan-600 font-bold">{{ Auth::user()->name }}</span> di Portal E-Laporan PKL.
                    </p>
                </div>
                <div class="group flex items-center gap-3 bg-gradient-to-br from-white to-slate-50 p-3 rounded-2xl shadow-xl shadow-slate-200/50 border border-cyan-500/20 hover:shadow-2xl hover:shadow-cyan-500/20 hover:scale-105 transition-all duration-500 animate-bounce-subtle">
                    <div class="w-14 h-14 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-cyan-500/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <i class="fa-solid fa-user-graduate text-2xl"></i>
                    </div>
                    <div class="pr-2">
                        <p class="text-[10px] font-black text-cyan-600 uppercase tracking-widest leading-none">Status Peserta</p>
                        <p class="text-sm font-bold text-slate-700 mt-1">Mahasiswa Aktif</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Statistics Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Total Jurnal -->
                        <div class="group relative bg-gradient-to-br from-white to-slate-50 p-6 rounded-3xl border border-cyan-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-cyan-500/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.1s;">
                            <div class="absolute -right-6 -top-6 w-32 h-32 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-full group-hover:scale-125 transition-transform duration-500 opacity-50"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/0 via-blue-500/0 to-indigo-500/0 group-hover:from-cyan-500/5 group-hover:via-blue-500/5 group-hover:to-indigo-500/5 transition-all duration-700 animate-shimmer"></div>
                            
                            <div class="relative">
                                <div class="flex items-center justify-between mb-4">
                                    <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">Total Jurnal</p>
                                    <div class="w-10 h-10 bg-cyan-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                                        <i class="fa-solid fa-book text-cyan-500"></i>
                                    </div>
                                </div>
                                <div class="flex items-end gap-3">
                                    <span class="text-5xl font-black bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">{{ $data['total'] }}</span>
                                    <span class="text-xs font-bold text-slate-400 mb-2.5 uppercase tracking-wider">Berkas</span>
                                </div>
                            </div>
                            
                            <div class="absolute top-3 right-3 w-2 h-2 bg-cyan-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
                        </div>

                        <!-- Disetujui -->
                        <div class="group relative bg-gradient-to-br from-white to-green-50/30 p-6 rounded-3xl border border-green-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-green-500/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.2s;">
                            <div class="absolute -right-6 -top-6 w-32 h-32 bg-gradient-to-br from-green-100 to-emerald-100 rounded-full group-hover:scale-125 transition-transform duration-500 opacity-50"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-green-500/0 via-emerald-500/0 to-teal-500/0 group-hover:from-green-500/5 group-hover:via-emerald-500/5 group-hover:to-teal-500/5 transition-all duration-700 animate-shimmer"></div>
                            
                            <div class="relative">
                                <div class="flex items-center justify-between mb-4">
                                    <p class="text-[11px] font-black text-green-600 uppercase tracking-[0.2em]">Disetujui</p>
                                    <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                                        <i class="fa-solid fa-check-circle text-green-500"></i>
                                    </div>
                                </div>
                                <div class="flex items-end gap-3">
                                    <span class="text-5xl font-black text-green-600 group-hover:scale-110 transition-transform duration-300">{{ $data['disetujui'] }}</span>
                                    <span class="text-xs font-bold text-slate-400 mb-2.5 uppercase tracking-wider">Valid</span>
                                </div>
                            </div>
                            
                            <div class="absolute top-3 right-3 w-2 h-2 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
                        </div>

                        <!-- Pending -->
                        <div class="group relative bg-gradient-to-br from-white to-amber-50/30 p-6 rounded-3xl border border-amber-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-amber-500/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.3s;">
                            <div class="absolute -right-6 -top-6 w-32 h-32 bg-gradient-to-br from-amber-100 to-yellow-100 rounded-full group-hover:scale-125 transition-transform duration-500 opacity-50"></div>
                            <div class="absolute inset-0 bg-gradient-to-r from-amber-500/0 via-yellow-500/0 to-orange-500/0 group-hover:from-amber-500/5 group-hover:via-yellow-500/5 group-hover:to-orange-500/5 transition-all duration-700 animate-shimmer"></div>
                            
                            <div class="relative">
                                <div class="flex items-center justify-between mb-4">
                                    <p class="text-[11px] font-black text-amber-600 uppercase tracking-[0.2em]">Pending</p>
                                    <div class="w-10 h-10 bg-amber-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                                        <i class="fa-solid fa-clock text-amber-500"></i>
                                    </div>
                                </div>
                                <div class="flex items-end gap-3">
                                    <span class="text-5xl font-black text-amber-500 group-hover:scale-110 transition-transform duration-300">{{ $data['pending'] }}</span>
                                    <span class="text-xs font-bold text-slate-400 mb-2.5 uppercase tracking-wider">Review</span>
                                </div>
                            </div>
                            
                            <div class="absolute top-3 right-3 w-2 h-2 bg-amber-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
                        </div>
                    </div>

                    <!-- Quick Access Section -->
                    <div class="relative bg-gradient-to-br from-indigo-900 via-blue-900 to-indigo-900 rounded-[2.5rem] p-8 text-white shadow-2xl shadow-indigo-500/30 overflow-hidden group hover:shadow-3xl hover:shadow-indigo-500/40 transition-all duration-500 animate-slide-up" style="animation-delay: 0.4s;">
                        <!-- Background Effects -->
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 via-blue-500/10 to-indigo-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                        <div class="absolute right-0 bottom-0 opacity-5 group-hover:opacity-10 transition-opacity duration-500">
                            <i class="fa-solid fa-paper-plane text-[180px] -rotate-12 translate-y-10 group-hover:translate-y-8 group-hover:rotate-[-8deg] transition-all duration-700"></i>
                        </div>
                        <div class="absolute top-0 left-0 w-64 h-64 bg-cyan-500/5 rounded-full blur-3xl animate-pulse-slow"></div>
                        <div class="absolute bottom-0 right-0 w-64 h-64 bg-blue-500/5 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
                        
                        <div class="relative">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/20 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="fa-solid fa-bolt text-yellow-400 text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-black text-white uppercase tracking-wider">Akses Cepat Jurnal</h3>
                            </div>
                            <p class="text-indigo-200 text-sm mb-8 max-w-md ml-15">Perbarui jurnal harian Anda secara rutin untuk mempermudah monitoring oleh pembimbing lapangan.</p>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <a href="{{ route('reports.create') }}" class="group/btn relative flex items-center justify-between p-5 bg-white/10 backdrop-blur-md rounded-2xl hover:bg-white/20 transition-all duration-300 border border-white/10 hover:border-white/30 overflow-hidden hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/0 to-blue-500/0 group-hover/btn:from-cyan-500/20 group-hover/btn:to-blue-500/20 transition-all duration-500"></div>
                                    <span class="relative font-bold text-sm tracking-wide flex items-center gap-2">
                                        <i class="fa-solid fa-plus-circle text-cyan-400 group-hover/btn:scale-110 transition-transform"></i>
                                        Buat Laporan Baru
                                    </span>
                                    <i class="fa-solid fa-arrow-right relative group-hover/btn:translate-x-2 transition-transform duration-300"></i>
                                </a>
                                
                                <a href="{{ route('reports.index') }}" class="group/btn relative flex items-center justify-between p-5 bg-white/10 backdrop-blur-md rounded-2xl hover:bg-white/20 transition-all duration-300 border border-white/10 hover:border-white/30 overflow-hidden hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/0 to-indigo-500/0 group-hover/btn:from-blue-500/20 group-hover/btn:to-indigo-500/20 transition-all duration-500"></div>
                                    <span class="relative font-bold text-sm tracking-wide flex items-center gap-2">
                                        <i class="fa-solid fa-history text-blue-400 group-hover/btn:scale-110 transition-transform"></i>
                                        Lihat Riwayat
                                    </span>
                                    <i class="fa-solid fa-arrow-right relative group-hover/btn:translate-x-2 transition-transform duration-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Info System -->
                    <div class="bg-gradient-to-br from-white to-slate-50 p-8 rounded-[2.5rem] border border-cyan-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-cyan-500/20 transition-all duration-500 group animate-slide-up" style="animation-delay: 0.5s;">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-cyan-500/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i class="fa-solid fa-circle-info text-lg"></i>
                            </div>
                            <h4 class="font-black bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent uppercase tracking-widest text-xs">Informasi Sistem</h4>
                        </div>
                        
                        <ul class="space-y-4">
                            <li class="flex items-start gap-4 p-3 bg-cyan-50/50 rounded-xl hover:bg-cyan-50 transition-colors duration-300 group/item">
                                <div class="w-2 h-2 rounded-full bg-cyan-500 mt-2 animate-pulse"></div>
                                <p class="text-xs text-slate-600 leading-relaxed font-medium">
                                    Jangan lupa untuk melakukan <span class="text-cyan-600 font-bold">Cetak PDF</span> di akhir bulan sebagai lampiran fisik.
                                </p>
                            </li>
                            <li class="flex items-start gap-4 p-3 bg-blue-50/50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/item">
                                <div class="w-2 h-2 rounded-full bg-blue-500 mt-2 animate-pulse" style="animation-delay: 0.5s;"></div>
                                <p class="text-xs text-slate-600 leading-relaxed font-medium">
                                    Pastikan deskripsi kegiatan jelas dan mencakup tugas yang dikerjakan hari ini.
                                </p>
                            </li>
                        </ul>

                        <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent my-6"></div>

                        <div class="relative bg-gradient-to-br from-cyan-50 to-blue-50 rounded-2xl p-5 border border-cyan-500/20 overflow-hidden group/period hover:shadow-lg hover:shadow-cyan-500/20 transition-all duration-300">
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/0 to-blue-500/0 group-hover/period:from-cyan-500/10 group-hover/period:to-blue-500/10 transition-all duration-500"></div>
                            <div class="relative text-center">
                                <div class="flex items-center justify-center gap-2 mb-2">
                                    <i class="fa-solid fa-calendar text-cyan-600 text-sm"></i>
                                    <p class="text-[10px] font-black text-cyan-600 uppercase tracking-widest">Periode Laporan</p>
                                </div>
                                <p class="font-black text-slate-700 text-base bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
                                    {{ now()->startOfMonth()->translatedFormat('d M') }} — {{ now()->endOfMonth()->translatedFormat('d M Y') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Info -->
                    <div class="text-center px-4 py-6 bg-gradient-to-br from-slate-100 to-slate-50 rounded-3xl border border-slate-200/50 hover:shadow-lg hover:shadow-slate-200 transition-all duration-300 animate-slide-up" style="animation-delay: 0.6s;">
                        <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-xl mx-auto mb-3 flex items-center justify-center shadow-lg shadow-cyan-500/30">
                            <i class="fa-solid fa-building text-white text-lg"></i>
                        </div>
                        <p class="text-[11px] font-black bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent uppercase tracking-[0.3em] mb-2">Dinas Kominfo Binjai</p>
                        <p class="text-[10px] text-slate-500 font-medium">Sistem Monitoring Magang v1.0</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        /* Background floating particles */
        @keyframes float-1 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
            33% { transform: translate(30px, -30px) scale(1.2); opacity: 0.6; }
            66% { transform: translate(-20px, 20px) scale(0.8); opacity: 0.4; }
        }
        @keyframes float-2 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.4; }
            33% { transform: translate(-40px, 30px) scale(1.3); opacity: 0.7; }
            66% { transform: translate(25px, -25px) scale(0.9); opacity: 0.5; }
        }
        @keyframes float-3 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
            33% { transform: translate(35px, 25px) scale(1.1); opacity: 0.6; }
            66% { transform: translate(-30px, -20px) scale(0.85); opacity: 0.4; }
        }
        @keyframes float-4 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.35; }
            33% { transform: translate(-25px, -35px) scale(1.25); opacity: 0.65; }
            66% { transform: translate(30px, 15px) scale(0.9); opacity: 0.45; }
        }
        @keyframes float-5 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.4; }
            33% { transform: translate(20px, -25px) scale(1.15); opacity: 0.7; }
            66% { transform: translate(-35px, 30px) scale(0.95); opacity: 0.5; }
        }
        @keyframes float-6 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
            33% { transform: translate(-30px, 20px) scale(1.2); opacity: 0.6; }
            66% { transform: translate(25px, -30px) scale(0.85); opacity: 0.4; }
        }

        .animate-float-1 { animation: float-1 8s ease-in-out infinite; }
        .animate-float-2 { animation: float-2 10s ease-in-out infinite; }
        .animate-float-3 { animation: float-3 12s ease-in-out infinite; }
        .animate-float-4 { animation: float-4 9s ease-in-out infinite; }
        .animate-float-5 { animation: float-5 11s ease-in-out infinite; }
        .animate-float-6 { animation: float-6 13s ease-in-out infinite; }

        /* Slide animations */
        @keyframes slide-down {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down {
            animation: slide-down 0.6s ease-out;
        }

        @keyframes slide-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up {
            opacity: 0;
            animation: slide-up 0.6s ease-out forwards;
        }

        /* Gradient flow */
        @keyframes gradient-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient-flow {
            background-size: 200% 200%;
            animation: gradient-flow 4s ease infinite;
        }

        /* Bounce subtle */
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .animate-bounce-subtle { animation: bounce-subtle 3s ease-in-out infinite; }

        /* Shimmer effect */
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .animate-shimmer {
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }

        /* Pulse slow */
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.1); }
        }
        .animate-pulse-slow { animation: pulse-slow 4s ease-in-out infinite; }
    </style>
</x-app-layout>