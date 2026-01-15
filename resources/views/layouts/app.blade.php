<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Laporan PKL | Kominfo Binjai</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Figtree', sans-serif; }
        
        .sidebar-scroll::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: rgba(30, 27, 75, 0.5);
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(99, 102, 241, 0.5);
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-[#f4f7fe] antialiased font-sans" x-data="{ sidebarOpen: true }">
    <div class="flex h-screen overflow-hidden">
        
        <aside 
            :class="sidebarOpen ? 'w-72' : 'w-0 -ml-72 md:ml-0 md:w-20'"
            class="bg-indigo-950 text-white flex-shrink-0 flex flex-col shadow-2xl z-30 border-r border-indigo-900/50 transition-all duration-300 ease-in-out overflow-hidden">
            
            <div class="p-8 text-center bg-indigo-900/20 min-w-[288px]" x-show="sidebarOpen" x-transition>
                <div class="flex justify-center mb-5">
                    <div class="bg-white w-24 h-24 rounded-full shadow-2xl flex items-center justify-center overflow-hidden border-4 border-indigo-500/30">
                        <img src="{{ asset('images/binjai_logo.png') }}" alt="Logo Binjai" class="w-16 h-16 object-contain">
                    </div>
                </div>
                <h1 class="text-xl font-black tracking-tighter uppercase leading-tight">
                    Kominfo <span class="text-indigo-400">Binjai</span>
                </h1>
            </div>

            <div class="py-8 flex justify-center" x-show="!sidebarOpen">
                <img src="{{ asset('images/binjai_logo.png') }}" class="w-10 h-10 object-contain bg-white rounded-full p-1">
            </div>
            
            <div class="flex-1 mt-4 px-4 space-y-8 sidebar-scroll overflow-y-auto overflow-x-hidden min-w-[288px]">
                <div>
                    <p class="px-4 text-[10px] font-black text-indigo-400/50 uppercase tracking-[0.2em] mb-4" x-show="sidebarOpen">Menu Utama</p>
                    <div class="space-y-1">
                        <a href="{{ route('dashboard') }}" 
                           class="flex items-center px-4 py-3.5 text-sm font-bold uppercase tracking-wider transition-all duration-300 group {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white rounded-2xl shadow-lg ring-1 ring-white/20' : 'text-indigo-300 hover:bg-white/5 hover:text-white rounded-2xl' }}">
                            <i class="fa-solid fa-house-chimney w-6 text-lg transition-transform group-hover:scale-110"></i>
                            <span class="ml-3 transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible'">Dashboard</span>
                        </a>

                        <a href="{{ route('reports.index') }}" 
                           class="flex items-center px-4 py-3.5 text-sm font-bold uppercase tracking-wider transition-all duration-300 group {{ request()->routeIs('reports.index') ? 'bg-indigo-600 text-white rounded-2xl shadow-lg ring-1 ring-white/20' : 'text-indigo-300 hover:bg-white/5 hover:text-white rounded-2xl' }}">
                            <i class="fa-solid fa-file-signature w-6 text-lg transition-transform group-hover:scale-110"></i>
                            <span class="ml-3 transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible'">Laporan Harian</span>
                        </a>
                    </div>
                </div>

                <div>
                    <p class="px-4 text-[10px] font-black text-indigo-400/50 uppercase tracking-[0.2em] mb-4" x-show="sidebarOpen">Akun & Profil</p>
                    <div class="space-y-1">
                        <a href="{{ route('profile.edit') }}" 
                           class="flex items-center px-4 py-3.5 text-sm font-bold uppercase tracking-wider transition-all duration-300 group {{ request()->routeIs('profile.edit') ? 'bg-indigo-600 text-white rounded-2xl shadow-lg ring-1 ring-white/20' : 'text-indigo-300 hover:bg-white/5 hover:text-white rounded-2xl' }}">
                            <i class="fa-solid fa-user-gear w-6 text-lg transition-transform group-hover:scale-110"></i>
                            <span class="ml-3 transition-opacity duration-300" :class="sidebarOpen ? 'opacity-100' : 'opacity-0 invisible'">Profil Saya</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-6 min-w-[288px]">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center justify-center p-4 bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white rounded-2xl transition-all group shadow-lg">
                        <i class="fa-solid fa-power-off text-lg group-hover:rotate-90 transition-transform"></i>
                        <span class="ml-3 font-black uppercase text-xs tracking-widest" x-show="sidebarOpen">Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white h-20 flex items-center justify-between px-8 z-20 border-b border-gray-100">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="p-2.5 rounded-xl bg-gray-50 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300 focus:outline-none">
                        <i class="fa-solid fa-bars-staggered text-xl" x-show="sidebarOpen"></i>
                        <i class="fa-solid fa-bars text-xl" x-show="!sidebarOpen"></i>
                    </button>

                    <div class="hidden md:flex items-center space-x-2 text-gray-400">
                        <span class="text-[11px] font-black uppercase tracking-[0.2em]">Sistem Informasi Pelaporan Mahasiswa PKL</span>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4 group">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-black text-gray-800 leading-none">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] font-bold text-green-500 uppercase tracking-tighter mt-1 flex items-center justify-end">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5 animate-pulse"></span> ONLINE
                        </p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-indigo-600 flex items-center justify-center text-white font-black shadow-lg shadow-indigo-200 border-2 border-white uppercase text-xl transform group-hover:scale-105 transition-all">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 md:p-10">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>