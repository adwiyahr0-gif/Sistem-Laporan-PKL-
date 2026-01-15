<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Laporan PKL | Kominfo Binjai</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .sidebar-transition {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu-hover:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .sidebar-scroll::-webkit-scrollbar { width: 3px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { 
            background: rgba(99, 102, 241, 0.2); 
            border-radius: 10px; 
        }

        .logo-glow {
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.2);
            animation: pulse-glow 3s infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 15px rgba(99, 102, 241, 0.2); }
            50% { box-shadow: 0 0 25px rgba(99, 102, 241, 0.4); }
        }
    </style>
</head>
<body class="bg-[#f0f2f9] antialiased" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        
        <aside 
            :class="sidebarOpen ? 'w-72' : 'w-24'"
            class="sidebar-transition bg-[#1e293b] text-white flex-shrink-0 flex flex-col shadow-2xl z-30 overflow-hidden relative">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/10 rounded-full -mr-16 -mt-16 blur-3xl"></div>
            
            <div class="relative py-8 flex flex-col items-center border-b border-white/5">
                <div 
                    :class="sidebarOpen ? 'w-20 h-20' : 'w-12 h-12'"
                    class="sidebar-transition bg-white rounded-full p-1.5 logo-glow border-2 border-indigo-400/30 flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/binjai_logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                </div>
                
                <div x-show="sidebarOpen" x-transition:enter="transition opacity-300" class="mt-4 text-center">
                    <h1 class="text-base font-extrabold tracking-tight leading-none uppercase text-indigo-100">
                        Kominfo <span class="text-indigo-400">Binjai</span>
                    </h1>
                    <div class="mt-2 px-3 py-1 bg-indigo-500/20 rounded-full inline-block">
                        <p class="text-[8px] text-indigo-300 font-bold uppercase tracking-[0.2em]">E-Laporan PKL v1.0</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 px-4 py-6 space-y-6 overflow-y-auto sidebar-scroll relative">
                
                <div>
                    <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3" x-show="sidebarOpen">Utama</p>
                    <div class="space-y-1">
                        <a href="{{ route('dashboard') }}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 menu-hover {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40' : 'text-slate-400' }}">
                            <div class="w-8 flex justify-center"><i class="fa-solid fa-house-user text-lg"></i></div>
                            <span class="ml-3 font-semibold text-sm tracking-wide" x-show="sidebarOpen">Dashboard</span>
                        </a>

                        <a href="{{ route('reports.index') }}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 menu-hover {{ request()->routeIs('reports.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40' : 'text-slate-400' }}">
                            <div class="w-8 flex justify-center"><i class="fa-solid fa-book-open-reader text-lg"></i></div>
                            <span class="ml-3 font-semibold text-sm tracking-wide" x-show="sidebarOpen">Laporan Harian</span>
                        </a>
                    </div>
                </div>

                <div>
                    <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3" x-show="sidebarOpen">Aktivitas</p>
                    <div class="space-y-1">
                        <a href="{{ route('presensi.index') }}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 menu-hover {{ request()->routeIs('presensi.index') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40' : 'text-slate-400' }}">
                            <div class="w-8 flex justify-center"><i class="fa-solid fa-calendar-check text-lg"></i></div>
                            <span class="ml-3 font-semibold text-sm tracking-wide" x-show="sidebarOpen">Presensi Magang</span>
                        </a>
                        <a href="{{ route('statistik.index') }}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 menu-hover {{ request()->routeIs('statistik.index') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40' : 'text-slate-400' }}">
                            <div class="w-8 flex justify-center"><i class="fa-solid fa-chart-line text-lg"></i></div>
                            <span class="ml-3 font-semibold text-sm tracking-wide" x-show="sidebarOpen">Statistik Laporan</span>
                        </a>
                    </div>
                </div>

                <div>
                    <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3" x-show="sidebarOpen">Informasi PKL</p>
                    <div class="space-y-1">
                        <a href="{{ route('pengumuman.index') }}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 menu-hover {{ request()->routeIs('pengumuman.index') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40' : 'text-slate-400' }}">
                            <div class="w-8 flex justify-center"><i class="fa-solid fa-bullhorn text-lg"></i></div>
                            <span class="ml-3 font-semibold text-sm tracking-wide" x-show="sidebarOpen">Pengumuman</span>
                        </a>
                        <a href="{{ route('panduan.index') }}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 menu-hover {{ request()->routeIs('panduan.index') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40' : 'text-slate-400' }}">
                            <div class="w-8 flex justify-center"><i class="fa-solid fa-file-pdf text-lg"></i></div>
                            <span class="ml-3 font-semibold text-sm tracking-wide" x-show="sidebarOpen">Panduan & Berkas</span>
                        </a>
                        <a href="{{ route('pembimbing.index') }}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 menu-hover {{ request()->routeIs('pembimbing.index') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40' : 'text-slate-400' }}">
                            <div class="w-8 flex justify-center"><i class="fa-solid fa-users-gear text-lg"></i></div>
                            <span class="ml-3 font-semibold text-sm tracking-wide" x-show="sidebarOpen">Daftar Pembimbing</span>
                        </a>
                    </div>
                </div>

                <div>
                    <p class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-3" x-show="sidebarOpen">Sistem</p>
                    <div class="space-y-1">
                        <a href="{{ route('profile.edit') }}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all duration-300 menu-hover {{ request()->routeIs('profile.edit') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/40' : 'text-slate-400' }}">
                            <div class="w-8 flex justify-center"><i class="fa-solid fa-fingerprint text-lg"></i></div>
                            <span class="ml-3 font-semibold text-sm tracking-wide" x-show="sidebarOpen">Keamanan Profil</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6 relative z-10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full p-3.5 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-xl transition-all duration-300 group border border-red-500/20 shadow-lg shadow-red-500/5">
                        <i class="fa-solid fa-power-off text-lg transition-transform group-hover:rotate-90"></i>
                        <span class="ml-3 font-bold text-xs uppercase tracking-widest" x-show="sidebarOpen">Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-white/80 backdrop-blur-md h-20 flex items-center justify-between px-8 border-b border-slate-100 z-20">
                <div class="flex items-center gap-6">
                    <button @click="sidebarOpen = !sidebarOpen" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-50 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600 transition-all border border-slate-100 shadow-sm">
                        <i class="fa-solid fa-bars-staggered" x-show="sidebarOpen"></i>
                        <i class="fa-solid fa-bars" x-show="!sidebarOpen"></i>
                    </button>
                    <h2 class="hidden md:block text-sm font-bold text-slate-400 uppercase tracking-widest">Portal Mahasiswa PKL</h2>
                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block border-r border-slate-100 pr-4">
                        <p class="text-sm font-extrabold text-slate-800">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] font-bold text-emerald-500 flex items-center justify-end uppercase mt-0.5">
                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-1.5 animate-pulse"></span> Online
                        </p>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-500 flex items-center justify-center text-white font-black shadow-lg shadow-indigo-200 uppercase text-lg">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 md:p-10 bg-[#f8faff]">
                <div class="max-w-6xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>