<x-guest-layout>
    <!-- Animated background particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-cyan-400 rounded-full animate-float-1" style="top: 10%; left: 10%;"></div>
        <div class="absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2" style="top: 20%; left: 80%;"></div>
        <div class="absolute w-2 h-2 bg-indigo-400 rounded-full animate-float-3" style="top: 60%; left: 15%;"></div>
        <div class="absolute w-3 h-3 bg-cyan-300 rounded-full animate-float-4" style="top: 80%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-blue-300 rounded-full animate-float-5" style="top: 40%; left: 70%;"></div>
        <div class="absolute w-4 h-4 bg-indigo-300 rounded-full animate-float-6" style="top: 70%; left: 30%;"></div>
    </div>

    <div class="text-center mb-8 relative z-10">
        <div class="relative inline-block">
            <!-- Multiple animated glow layers -->
            <div class="absolute -inset-3 bg-gradient-to-r from-cyan-400 via-blue-400 to-indigo-400 rounded-full blur-2xl opacity-60 animate-pulse-slow"></div>
            <div class="absolute -inset-2 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full blur-xl opacity-50 animate-spin-slow"></div>
            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-300 to-indigo-300 rounded-full blur-lg opacity-40 animate-ping-slow"></div>
            <img src="{{ asset('images/binjai_logo.png')}}" alt="" width="100" class="relative z-10 animate-bounce-subtle">
        </div>
        
        <h2 class="text-3xl font-black bg-gradient-to-r from-cyan-300 via-blue-300 to-indigo-300 bg-clip-text text-transparent tracking-tighter uppercase mt-6 animate-gradient-flow">DAFTAR AKUN</h2>
        <p class="text-[10px] bg-gradient-to-r from-cyan-200 to-blue-200 bg-clip-text text-transparent font-bold tracking-[0.4em] uppercase opacity-90 mt-1 animate-fade-in">E-Laporan PKL Diskominfo</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5 relative z-10">
        @csrf

        <!-- Name -->
        <div class="relative group animate-slide-up" style="animation-delay: 0.1s;">
            <label class="text-[10px] font-bold text-cyan-300 uppercase ml-4 mb-1 block opacity-80 transition-all duration-300 group-hover:opacity-100 group-hover:text-cyan-200 group-hover:tracking-wider">Nama Lengkap</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-cyan-400 transition-all duration-300 group-hover:text-blue-300 group-hover:scale-125 group-hover:rotate-12">
                    <i class="fa-solid fa-user text-sm"></i>
                </span>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                    class="block w-full pl-12 pr-4 py-3.5 bg-gradient-to-r from-slate-800/40 to-slate-700/40 border border-cyan-500/30 rounded-2xl text-white placeholder-cyan-300/30 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent focus:bg-gradient-to-r focus:from-slate-800/60 focus:to-slate-700/60 transition-all duration-500 hover:border-cyan-400/60 hover:shadow-xl hover:shadow-cyan-500/30 hover:scale-[1.02]"
                    placeholder="Masukkan nama lengkap">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-cyan-500/0 via-blue-500/0 to-indigo-500/0 group-hover:from-cyan-500/20 group-hover:via-blue-500/20 group-hover:to-indigo-500/20 transition-all duration-700 pointer-events-none animate-shimmer"></div>
                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                    <div class="absolute inset-0 rounded-2xl border-2 border-cyan-400/50 animate-border-glow"></div>
                </div>
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="relative group animate-slide-up" style="animation-delay: 0.2s;">
            <label class="text-[10px] font-bold text-cyan-300 uppercase ml-4 mb-1 block opacity-80 transition-all duration-300 group-hover:opacity-100 group-hover:text-cyan-200 group-hover:tracking-wider">Email Address</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-cyan-400 transition-all duration-300 group-hover:text-blue-300 group-hover:scale-125 group-hover:rotate-12">
                    <i class="fa-solid fa-envelope text-sm"></i>
                </span>
                <input id="email" type="email" name="email" :value="old('email')" required 
                    class="block w-full pl-12 pr-4 py-3.5 bg-gradient-to-r from-slate-800/40 to-slate-700/40 border border-cyan-500/30 rounded-2xl text-white placeholder-cyan-300/30 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent focus:bg-gradient-to-r focus:from-slate-800/60 focus:to-slate-700/60 transition-all duration-500 hover:border-cyan-400/60 hover:shadow-xl hover:shadow-cyan-500/30 hover:scale-[1.02]"
                    placeholder="nama@email.com">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-cyan-500/0 via-blue-500/0 to-indigo-500/0 group-hover:from-cyan-500/20 group-hover:via-blue-500/20 group-hover:to-indigo-500/20 transition-all duration-700 pointer-events-none animate-shimmer"></div>
                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                    <div class="absolute inset-0 rounded-2xl border-2 border-cyan-400/50 animate-border-glow"></div>
                </div>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="relative group animate-slide-up" style="animation-delay: 0.3s;">
            <label class="text-[10px] font-bold text-cyan-300 uppercase ml-4 mb-1 block opacity-80 transition-all duration-300 group-hover:opacity-100 group-hover:text-cyan-200 group-hover:tracking-wider">Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-cyan-400 transition-all duration-300 group-hover:text-blue-300 group-hover:scale-125 group-hover:rotate-[-12deg]">
                    <i class="fa-solid fa-lock text-sm"></i>
                </span>
                <input id="password" type="password" name="password" required 
                    class="block w-full pl-12 pr-4 py-3.5 bg-gradient-to-r from-slate-800/40 to-slate-700/40 border border-cyan-500/30 rounded-2xl text-white placeholder-cyan-300/30 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent focus:bg-gradient-to-r focus:from-slate-800/60 focus:to-slate-700/60 transition-all duration-500 hover:border-cyan-400/60 hover:shadow-xl hover:shadow-cyan-500/30 hover:scale-[1.02]"
                    placeholder="Minimal 8 karakter">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-cyan-500/0 via-blue-500/0 to-indigo-500/0 group-hover:from-cyan-500/20 group-hover:via-blue-500/20 group-hover:to-indigo-500/20 transition-all duration-700 pointer-events-none animate-shimmer"></div>
                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                    <div class="absolute inset-0 rounded-2xl border-2 border-cyan-400/50 animate-border-glow"></div>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="relative group animate-slide-up" style="animation-delay: 0.4s;">
            <label class="text-[10px] font-bold text-cyan-300 uppercase ml-4 mb-1 block opacity-80 transition-all duration-300 group-hover:opacity-100 group-hover:text-cyan-200 group-hover:tracking-wider">Konfirmasi Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-cyan-400 transition-all duration-300 group-hover:text-blue-300 group-hover:scale-125 group-hover:rotate-12">
                    <i class="fa-solid fa-lock text-sm"></i>
                </span>
                <input id="password_confirmation" type="password" name="password_confirmation" required 
                    class="block w-full pl-12 pr-4 py-3.5 bg-gradient-to-r from-slate-800/40 to-slate-700/40 border border-cyan-500/30 rounded-2xl text-white placeholder-cyan-300/30 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent focus:bg-gradient-to-r focus:from-slate-800/60 focus:to-slate-700/60 transition-all duration-500 hover:border-cyan-400/60 hover:shadow-xl hover:shadow-cyan-500/30 hover:scale-[1.02]"
                    placeholder="Ulangi password">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-cyan-500/0 via-blue-500/0 to-indigo-500/0 group-hover:from-cyan-500/20 group-hover:via-blue-500/20 group-hover:to-indigo-500/20 transition-all duration-700 pointer-events-none animate-shimmer"></div>
                <div class="absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                    <div class="absolute inset-0 rounded-2xl border-2 border-cyan-400/50 animate-border-glow"></div>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6 animate-slide-up" style="animation-delay: 0.5s;">
            <a href="{{ route('login') }}" class="text-[10px] font-bold text-cyan-400 hover:text-blue-300 transition-all duration-300 uppercase tracking-tighter relative group/link mr-4">
                Sudah punya akun?
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-cyan-400 to-blue-400 group-hover/link:w-full transition-all duration-500"></span>
                <span class="absolute -inset-1 bg-cyan-400/20 rounded opacity-0 group-hover/link:opacity-100 blur transition-opacity duration-300"></span>
            </a>

            <button type="submit" 
                class="relative px-8 py-3.5 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500 hover:from-cyan-400 hover:via-blue-400 hover:to-indigo-400 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-cyan-500/50 hover:shadow-2xl hover:shadow-cyan-400/60 transform active:scale-95 hover:scale-105 transition-all duration-500 overflow-hidden group/btn">
                <span class="relative z-10 flex items-center justify-center">
                    DAFTAR SEKARANG
                    <i class="fa-solid fa-user-plus ml-2 group-hover/btn:translate-x-2 group-hover/btn:scale-110 transition-all duration-300 inline-block"></i>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-indigo-400 to-cyan-400 opacity-0 group-hover/btn:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent translate-x-[-200%] group-hover/btn:translate-x-[200%] transition-transform duration-1000 skew-x-12"></div>
                <div class="absolute inset-0 overflow-hidden pointer-events-none">
                    <div class="particle-btn particle-btn-1"></div>
                    <div class="particle-btn particle-btn-2"></div>
                    <div class="particle-btn particle-btn-3"></div>
                    <div class="particle-btn particle-btn-4"></div>
                    <div class="particle-btn particle-btn-5"></div>
                </div>
                <div class="absolute inset-0 rounded-2xl border-2 border-white/50 opacity-0 group-hover/btn:opacity-100 group-hover/btn:animate-pulse-ring"></div>
            </button>
        </div>
    </form>

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

        /* Logo animations */
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

        @keyframes ping-slow {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }
        .animate-ping-slow { animation: ping-slow 4s ease-in-out infinite; }

        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .animate-bounce-subtle { animation: bounce-subtle 3s ease-in-out infinite; }

        /* Title gradient flow */
        @keyframes gradient-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient-flow {
            background-size: 200% 200%;
            animation: gradient-flow 4s ease infinite;
        }

        /* Fade in */
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 0.9; }
        }
        .animate-fade-in { animation: fade-in 1.5s ease-out; }

        /* Slide up */
        @keyframes slide-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up {
            opacity: 0;
            animation: slide-up 0.6s ease-out forwards;
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

        /* Border glow */
        @keyframes border-glow {
            0%, 100% { opacity: 0.3; box-shadow: 0 0 10px rgba(34, 211, 238, 0.3); }
            50% { opacity: 0.6; box-shadow: 0 0 20px rgba(34, 211, 238, 0.6); }
        }
        .animate-border-glow { animation: border-glow 2s ease-in-out infinite; }

        /* Button particles */
        @keyframes particle-float {
            0% { transform: translateY(0) translateX(0) scale(0); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateY(-40px) translateX(20px) scale(1); opacity: 0; }
        }

        .particle-btn {
            position: absolute;
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
            opacity: 0;
        }
        .particle-btn-1 { top: 80%; left: 20%; animation: particle-float 2s ease-out infinite; }
        .particle-btn-2 { top: 70%; left: 50%; animation: particle-float 2s ease-out infinite 0.4s; }
        .particle-btn-3 { top: 85%; left: 80%; animation: particle-float 2s ease-out infinite 0.8s; }
        .particle-btn-4 { top: 75%; left: 35%; animation: particle-float 2s ease-out infinite 1.2s; }
        .particle-btn-5 { top: 80%; left: 65%; animation: particle-float 2s ease-out infinite 1.6s; }

        .group/btn:hover .particle-btn {
            animation-play-state: running;
        }

        /* Pulse ring */
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.1); opacity: 0; }
        }
        .animate-pulse-ring { animation: pulse-ring 1.5s ease-out infinite; }
    </style>
</x-guest-layout>