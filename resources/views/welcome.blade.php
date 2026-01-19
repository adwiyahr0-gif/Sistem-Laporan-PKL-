<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Laporan PKL - Diskominfo Kota Binjai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-slate-900 via-blue-900 to-slate-900 min-h-screen overflow-x-hidden">
    
    <!-- Animated background particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-cyan-400 rounded-full animate-float-1" style="top: 10%; left: 10%;"></div>
        <div class="absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2" style="top: 20%; left: 80%;"></div>
        <div class="absolute w-2 h-2 bg-indigo-400 rounded-full animate-float-3" style="top: 60%; left: 15%;"></div>
        <div class="absolute w-3 h-3 bg-cyan-300 rounded-full animate-float-4" style="top: 80%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-blue-300 rounded-full animate-float-5" style="top: 40%; left: 70%;"></div>
        <div class="absolute w-4 h-4 bg-indigo-300 rounded-full animate-float-6" style="top: 70%; left: 30%;"></div>
        <div class="absolute w-2 h-2 bg-cyan-400 rounded-full animate-float-1" style="top: 30%; left: 50%;"></div>
        <div class="absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2" style="top: 50%; left: 90%;"></div>
    </div>

    <!-- Gradient overlay -->
    <div class="fixed inset-0 bg-gradient-to-b from-transparent via-slate-900/50 to-slate-900 pointer-events-none"></div>

    <!-- Main Content -->
    <div class="relative z-10 min-h-[calc(100vh-120px)] flex flex-col items-center justify-center px-4 py-12">
        
        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div class="text-center lg:text-left animate-fade-in-left">
                <!-- Logo -->
                <div class="relative inline-block mb-8 lg:mb-10">
                    <div class="absolute -inset-3 bg-gradient-to-r from-cyan-400 via-blue-400 to-indigo-400 rounded-full blur-2xl opacity-60 animate-pulse-slow"></div>
                    <div class="absolute -inset-2 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full blur-xl opacity-50 animate-spin-slow"></div>
                    <img src="/images/binjai_logo.png" alt="Logo Binjai" width="120" class="relative z-10 animate-bounce-subtle">
                </div>
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-black mb-6 leading-tight">
                    <span class="block text-white mb-2">SELAMAT DATANG DI</span>
                    <span class="block bg-gradient-to-r from-cyan-300 via-blue-300 to-indigo-300 bg-clip-text text-transparent animate-gradient-flow">
                        E-LAPORAN PKL
                    </span>
                </h1>
                
                <p class="text-lg md:text-xl text-slate-300 mb-4 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Portal Digital <span class="text-cyan-400 font-bold">Sistem Monitoring & Pelaporan</span> 
                    Praktik Kerja Lapangan
                </p>
                
                <p class="text-sm md:text-base text-slate-400 mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                    Dinas Komunikasi dan Informatika Kota Binjai menghadirkan solusi digital untuk memudahkan 
                    mahasiswa dalam melaporkan kegiatan PKL secara real-time dan terstruktur.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="/login" class="group/btn relative px-10 py-4 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500 hover:from-cyan-400 hover:via-blue-400 hover:to-indigo-400 text-white font-black text-sm uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-cyan-500/50 hover:shadow-2xl hover:shadow-cyan-400/60 transform active:scale-95 hover:scale-105 transition-all duration-500 overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center">
                            <i class="fa-solid fa-sign-in-alt mr-3 group-hover/btn:translate-x-[-3px] transition-transform duration-300"></i>
                            LOGIN
                            <i class="fa-solid fa-arrow-right ml-3 group-hover/btn:translate-x-2 transition-all duration-300"></i>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-indigo-400 to-cyan-400 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-200%] group-hover/btn:translate-x-[200%] transition-transform duration-1000 skew-x-12"></div>
                    </a>

                    <a href="/register" class="group relative px-10 py-4 bg-slate-800/60 backdrop-blur-sm border-2 border-cyan-500/40 hover:border-cyan-400 hover:bg-slate-700/60 text-cyan-300 hover:text-white font-black text-sm uppercase tracking-[0.2em] rounded-2xl shadow-lg shadow-cyan-500/20 hover:shadow-xl hover:shadow-cyan-400/40 transform active:scale-95 hover:scale-105 transition-all duration-500 overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center">
                            <i class="fa-solid fa-user-plus mr-3 group-hover:scale-110 transition-transform duration-300"></i>
                            REGISTER
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/0 to-blue-500/0 group-hover:from-cyan-500/10 group-hover:to-blue-500/10 transition-all duration-500"></div>
                    </a>
                </div>
            </div>

            <!-- Right Content - Features -->
            <div class="space-y-6 animate-fade-in-right">
                <!-- Feature 1 -->
                <div class="group bg-gradient-to-br from-slate-800/60 to-slate-700/60 backdrop-blur-sm border border-cyan-500/30 rounded-3xl p-6 hover:shadow-2xl hover:shadow-cyan-500/30 transition-all duration-500 hover:translate-x-2 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/0 via-blue-500/0 to-indigo-500/0 group-hover:from-cyan-500/10 group-hover:via-blue-500/10 group-hover:to-indigo-500/10 transition-all duration-700 animate-shimmer"></div>
                    <div class="relative z-10 flex items-start gap-5">
                        <div class="bg-cyan-500/20 p-4 rounded-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 flex-shrink-0">
                            <i class="fa-solid fa-file-alt text-cyan-400 text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-xl mb-2 uppercase">Laporan Digital</h3>
                            <p class="text-slate-400 text-sm leading-relaxed">
                                Buat dan kirim laporan harian PKL secara online dengan mudah, cepat, dan terstruktur
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group bg-gradient-to-br from-slate-800/60 to-slate-700/60 backdrop-blur-sm border border-blue-500/30 rounded-3xl p-6 hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-500 hover:translate-x-2 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/0 via-indigo-500/0 to-cyan-500/0 group-hover:from-blue-500/10 group-hover:via-indigo-500/10 group-hover:to-cyan-500/10 transition-all duration-700 animate-shimmer"></div>
                    <div class="relative z-10 flex items-start gap-5">
                        <div class="bg-blue-500/20 p-4 rounded-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 flex-shrink-0">
                            <i class="fa-solid fa-chart-line text-blue-400 text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-xl mb-2 uppercase">Monitoring Real-time</h3>
                            <p class="text-slate-400 text-sm leading-relaxed">
                                Pantau progress dan status persetujuan laporan Anda secara langsung dan transparan
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group bg-gradient-to-br from-slate-800/60 to-slate-700/60 backdrop-blur-sm border border-indigo-500/30 rounded-3xl p-6 hover:shadow-2xl hover:shadow-indigo-500/30 transition-all duration-500 hover:translate-x-2 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/0 via-cyan-500/0 to-blue-500/0 group-hover:from-indigo-500/10 group-hover:via-cyan-500/10 group-hover:to-blue-500/10 transition-all duration-700 animate-shimmer"></div>
                    <div class="relative z-10 flex items-start gap-5">
                        <div class="bg-indigo-500/20 p-4 rounded-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 flex-shrink-0">
                            <i class="fa-solid fa-download text-indigo-400 text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-black text-xl mb-2 uppercase">Export PDF</h3>
                            <p class="text-slate-400 text-sm leading-relaxed">
                                Unduh laporan dalam format PDF profesional untuk keperluan dokumentasi resmi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-20 text-center animate-fade-in">
            <p class="text-slate-500 text-sm mb-2">© 2026 Dinas Komunikasi dan Informatika Kota Binjai</p>
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

        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow { animation: spin-slow 10s linear infinite; }

        @keyframes pulse-slow {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.05); }
        }
        .animate-pulse-slow { animation: pulse-slow 3s ease-in-out infinite; }

        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .animate-bounce-subtle { animation: bounce-subtle 3s ease-in-out infinite; }

        @keyframes gradient-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient-flow {
            background-size: 200% 200%;
            animation: gradient-flow 4s ease infinite;
        }

        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fade-in {
            opacity: 0;
            animation: fade-in 1s ease-out forwards;
        }

        @keyframes fade-in-down {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out;
        }

        @keyframes fade-in-left {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-fade-in-left {
            animation: fade-in-left 1s ease-out;
        }

        @keyframes fade-in-right {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-fade-in-right {
            animation: fade-in-right 1s ease-out 0.3s backwards;
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .animate-shimmer {
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }
    </style>
</body>
</html>