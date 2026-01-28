<x-guest-layout>
    {{-- Tambahan library SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-cyan-400 rounded-full animate-float-1" style="top: 10%; left: 10%;"></div>
        <div class="absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2" style="top: 20%; left: 80%;"></div>
        <div class="absolute w-2 h-2 bg-indigo-400 rounded-full animate-float-3" style="top: 60%; left: 15%;"></div>
        <div class="absolute w-3 h-3 bg-cyan-300 rounded-full animate-float-4" style="top: 80%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-blue-300 rounded-full animate-float-5" style="top: 40%; left: 70%;"></div>
        <div class="absolute w-4 h-4 bg-indigo-300 rounded-full animate-float-6" style="top: 70%; left: 30%;"></div>
    </div>

    <div class="text-center mb-10 relative z-10">
        <div class="relative inline-block">
            <div class="absolute -inset-3 bg-gradient-to-r from-cyan-400 via-blue-400 to-indigo-400 rounded-full blur-2xl opacity-60 animate-pulse-slow"></div>
            <div class="absolute -inset-2 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full blur-xl opacity-50 animate-spin-slow"></div>
            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-300 to-indigo-300 rounded-full blur-lg opacity-40 animate-ping-slow"></div>
            <img src="{{ asset('images/binjai_logo.png')}}" alt="" width="100" class="relative z-10 animate-bounce-subtle">
        </div>
        
        <h2 class="text-3xl font-black bg-gradient-to-r from-cyan-300 via-blue-300 to-indigo-300 bg-clip-text text-transparent tracking-tighter uppercase mt-6 animate-gradient-flow">E-LAPORAN PKL</h2>
        <p class="text-[10px] bg-gradient-to-r from-cyan-200 to-blue-200 bg-clip-text text-transparent font-bold tracking-[0.4em] uppercase opacity-90 mt-1 animate-fade-in">Diskominfo Kota Binjai</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6 relative z-10">
        @csrf

        <div class="relative group animate-slide-up" style="animation-delay: 0.1s;">
            <label class="text-[10px] font-bold text-cyan-300 uppercase ml-4 mb-1 block opacity-80 transition-all duration-300 group-hover:opacity-100 group-hover:text-cyan-200 group-hover:tracking-wider">Email Address</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-cyan-400 transition-all duration-300 group-hover:text-blue-300 group-hover:scale-125 group-hover:rotate-12">
                    <i class="fa-solid fa-envelope text-sm"></i>
                </span>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    class="block w-full pl-12 pr-4 py-4 bg-gradient-to-r from-slate-800/40 to-slate-700/40 border border-cyan-500/30 rounded-2xl text-white placeholder-cyan-300/30 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition-all duration-500 hover:border-cyan-400/60 hover:shadow-xl hover:shadow-cyan-500/30"
                    placeholder="nama@email.com">
            </div>
        </div>

        <div class="relative group animate-slide-up" style="animation-delay: 0.2s;">
            <label class="text-[10px] font-bold text-cyan-300 uppercase ml-4 mb-1 block opacity-80 transition-all duration-300 group-hover:opacity-100 group-hover:text-cyan-200 group-hover:tracking-wider">Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-cyan-400 transition-all duration-300 group-hover:text-blue-300 group-hover:scale-125 group-hover:rotate-[-12deg]">
                    <i class="fa-solid fa-lock text-sm"></i>
                </span>
                
                <input id="password" type="password" name="password" required 
                    class="block w-full pl-12 pr-12 py-4 bg-gradient-to-r from-slate-800/40 to-slate-700/40 border border-cyan-500/30 rounded-2xl text-white placeholder-cyan-300/30 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent transition-all duration-500 hover:border-cyan-400/60 hover:shadow-xl hover:shadow-cyan-500/30"
                    placeholder="••••••••">

                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-4 text-cyan-400 hover:opacity-70 transition-opacity duration-300 focus:outline-none">
                    <i class="fa-solid fa-eye text-sm" id="eyeIcon"></i>
                </button>
            </div>
        </div>

        <div class="relative group animate-slide-up" style="animation-delay: 0.3s;">
            <label class="text-[10px] font-bold text-cyan-300 uppercase ml-4 mb-2 block opacity-80 transition-all duration-300 group-hover:opacity-100 group-hover:text-cyan-200 group-hover:tracking-wider">Login Sebagai</label>
            <div class="relative select2-cyan-wrapper">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-cyan-400 z-20 pointer-events-none group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-users-gear text-sm"></i>
                </span>
                <select id="role-select" name="role" class="w-full">
                    <option value="mahasiswa">Mahasiswa Magang</option>
                    <option value="admin">Administrator Sistem</option>
                </select>
            </div>
        </div>

        <div class="flex items-center justify-between px-2 animate-slide-up" style="animation-delay: 0.4s;">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group/check">
                <input id="remember_me" type="checkbox" name="remember" value="1" class="rounded border-cyan-500/30 bg-slate-800/40 text-cyan-500 focus:ring-cyan-400 focus:ring-offset-0 transition-all duration-300 hover:scale-110">
                <span class="ms-2 text-[10px] font-bold text-cyan-300/70 uppercase tracking-tighter italic group-hover/check:text-cyan-200 transition-all duration-300">Ingat Saya</span>
            </label>
            @if (Route::has('password.request'))
                <a class="relative group/link text-[10px] font-bold text-cyan-400 uppercase tracking-tighter transition-all duration-300 hover:text-white" href="{{ route('password.request') }}">
                    Lupa Password?
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-cyan-400 to-blue-400 group-hover/link:w-full transition-all duration-500"></span>
                </a>
            @endif
        </div>

        <button type="submit" 
            class="relative w-full py-4 bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500 hover:from-cyan-400 hover:via-blue-400 hover:to-indigo-400 text-white font-black text-xs uppercase tracking-[0.2em] rounded-2xl shadow-xl shadow-cyan-500/50 hover:shadow-2xl hover:shadow-cyan-400/60 transform active:scale-95 hover:scale-105 transition-all duration-500 overflow-hidden group/btn animate-slide-up" style="animation-delay: 0.45s;">
            <span class="relative z-10 flex items-center justify-center">
                LOGIN SEKARANG <i class="fa-solid fa-arrow-right ml-2 group-hover/btn:translate-x-2 transition-all duration-300"></i>
            </span>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-200%] group-hover/btn:translate-x-[200%] transition-transform duration-1000 skew-x-12"></div>
        </button>

        <div class="text-center mt-8 animate-slide-up" style="animation-delay: 0.5s;">
            <p class="text-[10px] text-cyan-300/60 uppercase font-bold tracking-widest">
                Belum punya akun? <a href="{{ route('register') }}" class="text-cyan-400 hover:text-blue-300 transition-all duration-300 underline decoration-cyan-400/50 underline-offset-2 inline-block hover:scale-110">Daftar</a>
            </p>
        </div>
    </form>

    <style>
        /* --- Select2 Custom Styling --- */
        .select2-container--default .select2-selection--single {
            background: linear-gradient(to right, rgba(30, 41, 59, 0.4), rgba(51, 65, 85, 0.4)) !important;
            border: 1px solid rgba(6, 182, 212, 0.3) !important;
            border-radius: 1rem !important;
            height: 58px !important;
            display: flex;
            align-items: center;
            transition: all 0.5s !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #fff !important;
            font-size: 11px !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.1em !important;
            padding-left: 48px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow { height: 56px !important; right: 15px !important; }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #22d3ee transparent transparent transparent !important;
            border-width: 6px 6px 0 6px !important;
        }
        .select2-dropdown { background: #1e293b !important; border: 1px solid rgba(34, 211, 238, 0.5) !important; border-radius: 1rem !important; color: white !important; }
        .select2-results__option--highlighted[aria-selected] { background: linear-gradient(to right, #0891b2, #0e7490) !important; }

        /* --- Animations --- */
        @keyframes float-1 { 0%, 100% { transform: translate(0, 0); opacity: 0.3; } 50% { transform: translate(30px, -30px); opacity: 0.6; } }
        @keyframes float-2 { 0%, 100% { transform: translate(0, 0); opacity: 0.4; } 50% { transform: translate(-40px, 30px); opacity: 0.7; } }
        .animate-float-1 { animation: float-1 8s infinite; }
        .animate-float-2 { animation: float-2 10s infinite; }
        .animate-spin-slow { animation: spin-slow 10s linear infinite; }
        .animate-pulse-slow { animation: pulse-slow 3s infinite; }
        .animate-gradient-flow { background-size: 200%; animation: gradient-flow 4s infinite; }
        @keyframes slide-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slide-up { opacity: 0; animation: slide-up 0.6s ease-out forwards; }
    </style>

    <script>
        $(document).ready(function() {
            $('#role-select').select2({
                minimumResultsForSearch: Infinity,
                width: '100%'
            });

            // Toggle Password Visibility
            $('#togglePassword').on('click', function() {
                const passwordField = $('#password');
                const eyeIcon = $('#eyeIcon');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                eyeIcon.toggleClass('fa-eye fa-eye-slash');
            });
        });

        // --- Logic SweetAlert Custom ---
        @if ($errors->any())
            @php
                $rawError = $errors->first();
                $title = 'Akses Ditolak';
                $message = 'Email atau password yang Anda masukkan salah. Silakan coba lagi.';
                
                // Cek jika error mengandung kata kunci role mismatch dari sistem
                if (strpos(strtolower($rawError), 'credentials') !== false) {
                    $message = 'Email atau password yang Anda masukkan salah. Silakan coba lagi.';
                } else {
                    // Jika kamu mengirimkan pesan custom dari controller, tampilkan pesan tersebut
                    $message = $rawError;
                }
            @endphp

            Swal.fire({
                icon: 'error',
                title: '{{ $title }}',
                text: '{!! $message !!}',
                background: '#1e293b',
                color: '#fff',
                confirmButtonColor: '#0891b2',
                confirmButtonText: 'COBA LAGI',
                customClass: {
                    popup: 'rounded-[2rem] border border-cyan-500/30 shadow-2xl shadow-cyan-500/20',
                    confirmButton: 'rounded-xl px-8 py-3 uppercase font-black text-[10px] tracking-widest'
                }
            });
        @endif
    </script>
</x-guest-layout>