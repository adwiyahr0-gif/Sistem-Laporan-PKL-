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

        /* Hover effect untuk Sidebar berwarna */
        .menu-hover:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(8px);
            color: white !important;
        }

        .sidebar-scroll::-webkit-scrollbar { width: 3px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
        .sidebar-scroll::-webkit-scrollbar-thumb { 
            background: rgba(255, 255, 255, 0.2); 
            border-radius: 10px; 
        }

        /* Logo bulat besar dan elegan */
        .logo-circle {
            border-radius: 50%;
            background: white;
            padding: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border: 4px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-[#f0f3ff] antialiased" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        
        <aside 
            :class="sidebarOpen ? 'w-80' : 'w-24'"
            class="sidebar-transition bg-[#4e5ecf] text-white flex-shrink-0 flex flex-col z-30 overflow-hidden relative shadow-2xl">
            
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-white/10 to-transparent pointer-events-none"></div>
            
            <div class="relative py-12 flex flex-col items-center border-b border-white/10">
                <div 
                    :class="sidebarOpen ? 'w-28 h-28' : 'w-14 h-14'"
                    class="sidebar-transition logo-circle flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/binjai_logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                </div>
                
                <div x-show="sidebarOpen" x-transition:enter="transition opacity-300" class="mt-6 text-center">
                    <h1 class="text-lg font-black tracking-widest uppercase text-white">
                        Kominfo <span class="text-indigo-200">Binjai</span>
                    </h1>
                    <p class="mt-2 text-[10px] text-indigo-100 font-bold uppercase tracking-[0.3em] opacity-80">Portal Monitoring PKL</p>
                </div>
            </div>

            <div class="flex-1 px-6 py-8 space-y-8 overflow-y-auto sidebar-scroll relative">
                
                @if(strtolower(Auth::user()->role) === 'admin')
                    <div>
                        <p class="px-4 text-[10px] font-black text-white/50 uppercase tracking-[0.2em] mb-4" x-show="sidebarOpen">Panel Utama Admin</p>
                        <div class="space-y-1.5">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover {{ request()->routeIs('admin.dashboard') ? 'bg-white text-[#4e5ecf] shadow-lg font-bold' : 'text-white/80' }}">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-chart-line text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Statistik Admin</span>
                            </a>

                            <a href="{{ route('admin.students.index') }}" 
                               class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover {{ request()->routeIs('admin.students.*') ? 'bg-white text-[#4e5ecf] shadow-lg font-bold' : 'text-white/80' }}">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-users text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Data Mahasiswa</span>
                            </a>
                            
                            <a href="#" class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover text-white/80">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-file-circle-check text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Validasi Laporan</span>
                            </a>
                        </div>
                    </div>
                @else
                    <div>
                        <p class="px-4 text-[10px] font-black text-white/50 uppercase tracking-[0.2em] mb-4" x-show="sidebarOpen">Utama</p>
                        <div class="space-y-1.5">
                            <a href="{{ route('dashboard') }}" 
                               class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover {{ request()->routeIs('dashboard') ? 'bg-white text-[#4e5ecf] shadow-lg font-bold' : 'text-white/80' }}">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-house-user text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Dashboard</span>
                            </a>

                            <a href="{{ route('reports.index') }}" 
                               class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover {{ request()->routeIs('reports.*') ? 'bg-white text-[#4e5ecf] shadow-lg font-bold' : 'text-white/80' }}">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-book-open-reader text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Laporan Harian</span>
                            </a>
                        </div>
                    </div>

                    <div>
                        <p class="px-4 text-[10px] font-black text-white/50 uppercase tracking-[0.2em] mb-4" x-show="sidebarOpen">Aktivitas</p>
                        <div class="space-y-1.5">
                            <a href="{{ route('presensi.index') }}" 
                               class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover {{ request()->routeIs('presensi.index') ? 'bg-white text-[#4e5ecf] shadow-lg font-bold' : 'text-white/80' }}">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-calendar-check text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Presensi Magang</span>
                            </a>
                            <a href="{{ route('statistik.index') }}" 
                               class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover {{ request()->routeIs('statistik.index') ? 'bg-white text-[#4e5ecf] shadow-lg font-bold' : 'text-white/80' }}">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-chart-line text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Statistik Laporan</span>
                            </a>
                        </div>
                    </div>

                    <div>
                        <p class="px-4 text-[10px] font-black text-white/50 uppercase tracking-[0.2em] mb-4" x-show="sidebarOpen">Informasi PKL</p>
                        <div class="space-y-1.5">
                            <a href="{{ route('pengumuman.index') }}" 
                               class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover {{ request()->routeIs('pengumuman.index') ? 'bg-white text-[#4e5ecf] shadow-lg font-bold' : 'text-white/80' }}">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-bullhorn text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Pengumuman</span>
                            </a>
                            <a href="{{ route('panduan.index') }}" 
                               class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover {{ request()->routeIs('panduan.index') ? 'bg-white text-[#4e5ecf] shadow-lg font-bold' : 'text-white/80' }}">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-file-pdf text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Berkas PKL</span>
                            </a>
                            <a href="#" class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover text-white/80">
                                <div class="w-8 flex justify-center"><i class="fa-solid fa-users-gear text-xl"></i></div>
                                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Daftar Pembimbing</span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="p-6 border-t border-white/10 bg-black/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full p-4 bg-red-500 hover:bg-red-600 text-white rounded-2xl transition-all duration-300 shadow-lg font-bold">
                        <i class="fa-solid fa-power-off text-lg"></i>
                        <span class="ml-3 font-black text-[10px] uppercase tracking-widest" x-show="sidebarOpen">Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-[#4e5ecf] text-white h-24 flex items-center justify-between px-10 z-20 shadow-lg border-b border-white/10">
                <div class="flex items-center gap-6">
                    <button @click="sidebarOpen = !sidebarOpen" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white/10 hover:bg-white/20 transition-all border border-white/20">
                        <i class="fa-solid fa-bars-staggered" x-show="sidebarOpen"></i>
                        <i class="fa-solid fa-bars" x-show="!sidebarOpen"></i>
                    </button>
                    <h2 class="hidden md:block text-xs font-black text-indigo-100 uppercase tracking-[0.4em]">
                        {{ strtolower(Auth::user()->role) === 'admin' ? 'Portal Administrator' : 'Portal Mahasiswa PKL' }}
                    </h2>
                </div>

                <div class="flex items-center gap-5">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-black text-white">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] font-bold text-green-300 flex items-center justify-end uppercase mt-0.5">
                            <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span> Sesi Aktif
                        </p>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-white text-[#4e5ecf] flex items-center justify-center font-black shadow-lg border-4 border-indigo-300/30 uppercase text-xl">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-8 md:p-12">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>