<x-app-layout>
    <!-- Animated background particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-indigo-400 rounded-full animate-float-1" style="top: 10%; left: 10%;"></div>
        <div class="absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2" style="top: 20%; left: 80%;"></div>
        <div class="absolute w-2 h-2 bg-purple-400 rounded-full animate-float-3" style="top: 60%; left: 15%;"></div>
        <div class="absolute w-3 h-3 bg-indigo-300 rounded-full animate-float-4" style="top: 80%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-blue-300 rounded-full animate-float-5" style="top: 40%; left: 70%;"></div>
        <div class="absolute w-4 h-4 bg-purple-300 rounded-full animate-float-6" style="top: 70%; left: 30%;"></div>
    </div>

    <div class="relative z-10">
        <!-- Header Section -->
        <div class="mb-8 animate-slide-down">
            <h1 class="text-4xl font-black tracking-tight uppercase mb-2">
                <span class="text-slate-800">PENGUMUMAN</span> 
                <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500 bg-clip-text text-transparent animate-gradient-flow">TERBARU</span>
            </h1>
            <p class="text-slate-500 font-medium">
                Informasi penting terkait kegiatan PKL dan administrasi
            </p>
        </div>

        <div class="space-y-6">
            <!-- Announcement 1 - Penting -->
            <div class="group relative bg-gradient-to-br from-white to-red-50/30 rounded-3xl shadow-xl shadow-slate-200/50 border-l-8 border-red-500 hover:shadow-2xl hover:shadow-red-500/30 transition-all duration-500 hover:scale-[1.02] overflow-hidden animate-slide-up" style="animation-delay: 0.1s;">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-gradient-to-br from-red-100 to-pink-100 rounded-full group-hover:scale-125 transition-transform duration-500 opacity-30"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-red-500/0 via-pink-500/0 to-red-500/0 group-hover:from-red-500/5 group-hover:via-pink-500/5 group-hover:to-red-500/5 transition-all duration-700 animate-shimmer"></div>
                
                <div class="relative p-8">
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 bg-red-500/10 rounded-2xl flex items-center justify-center text-red-500 shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg shadow-red-500/20">
                            <i class="fa-solid fa-triangle-exclamation text-3xl"></i>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-gradient-to-r from-red-500 to-pink-500 text-white text-[10px] font-black uppercase rounded-full tracking-widest shadow-lg shadow-red-500/30">
                                    <i class="fa-solid fa-star text-xs"></i>
                                    PENTING
                                </span>
                                <span class="flex items-center gap-2 text-xs text-slate-400 font-bold">
                                    <i class="fa-regular fa-clock"></i>
                                    <span>15 Jan 2026 • 09:00 WIB</span>
                                </span>
                            </div>
                            
                            <h3 class="text-2xl font-black text-slate-800 group-hover:text-red-600 transition-colors mb-3 uppercase tracking-tight">
                                Jadwal Presentasi Akhir Magang Periode Januari
                            </h3>
                            
                            <p class="text-slate-600 text-sm leading-relaxed mb-6">
                                Diberitahukan kepada seluruh mahasiswa PKL bahwa jadwal presentasi laporan akhir akan dilaksanakan secara tatap muka. Harap membawa laptop dan berkas fisik yang sudah diparaf pembimbing lapangan.
                            </p>

                            <div class="flex items-center gap-4">
                                <a href="#" class="group/btn relative inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/50 transition-all duration-300 hover:scale-105 overflow-hidden">
                                    <span class="relative z-10 flex items-center gap-2">
                                        <i class="fa-solid fa-file-pdf"></i>
                                        Download Jadwal.pdf
                                    </span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-200%] group-hover/btn:translate-x-[200%] transition-transform duration-700"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute top-4 right-4 w-2 h-2 bg-red-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
            </div>

            <!-- Announcement 2 - Info Kantor -->
            <div class="group relative bg-gradient-to-br from-white to-blue-50/30 rounded-3xl shadow-xl shadow-slate-200/50 border-l-8 border-blue-500 hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-500 hover:scale-[1.02] overflow-hidden animate-slide-up" style="animation-delay: 0.2s;">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-full group-hover:scale-125 transition-transform duration-500 opacity-30"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500/0 via-cyan-500/0 to-blue-500/0 group-hover:from-blue-500/5 group-hover:via-cyan-500/5 group-hover:to-blue-500/5 transition-all duration-700 animate-shimmer"></div>
                
                <div class="relative p-8">
                    <div class="flex items-start gap-6">
                        <div class="w-16 h-16 bg-blue-500/10 rounded-2xl flex items-center justify-center text-blue-500 shrink-0 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg shadow-blue-500/20">
                            <i class="fa-solid fa-info-circle text-3xl"></i>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-[10px] font-black uppercase rounded-full tracking-widest shadow-lg shadow-blue-500/30">
                                    <i class="fa-solid fa-building text-xs"></i>
                                    INFO KANTOR
                                </span>
                                <span class="flex items-center gap-2 text-xs text-slate-400 font-bold">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span>10 Jan 2026</span>
                                </span>
                            </div>
                            
                            <h3 class="text-2xl font-black text-slate-800 group-hover:text-blue-600 transition-colors mb-3 uppercase tracking-tight">
                                Pemberitahuan Hari Libur Nasional
                            </h3>
                            
                            <p class="text-slate-600 text-sm leading-relaxed">
                                Sehubungan dengan libur nasional, aktivitas di kantor Kominfo Binjai diliburkan. Mahasiswa tetap diwajibkan melakukan update laporan progres mingguan melalui portal ini.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="absolute top-4 right-4 w-2 h-2 bg-blue-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
            </div>

            <!-- Empty State / No More Announcements -->
            <div class="group relative bg-gradient-to-br from-white to-slate-50 rounded-3xl shadow-lg shadow-slate-200/50 border border-slate-200 p-12 text-center overflow-hidden animate-slide-up" style="animation-delay: 0.3s;">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/0 via-purple-500/0 to-blue-500/0 group-hover:from-indigo-500/5 group-hover:via-purple-500/5 group-hover:to-blue-500/5 transition-all duration-700"></div>
                
                <div class="relative z-10">
                    <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-indigo-50 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-check-circle text-indigo-400 text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-black text-slate-800 mb-2 uppercase">Semua Pengumuman Sudah Dibaca</h3>
                    <p class="text-slate-500 text-sm max-w-md mx-auto">
                        Anda sudah melihat semua pengumuman terbaru. Cek kembali nanti untuk update informasi berikutnya.
                    </p>
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
        .animate-slide-down { animation: slide-down 0.6s ease-out; }

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

        /* Shimmer effect */
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .animate-shimmer {
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }
    </style>
</x-app-layout>