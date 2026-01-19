<div class="flex-1 px-6 py-8 space-y-8 overflow-y-auto sidebar-scroll relative">
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
        </div>
    </div>

    <div>
        <p class="px-4 text-[10px] font-black text-white/50 uppercase tracking-[0.2em] mb-4" x-show="sidebarOpen">Laporan & Presensi</p>
        <div class="space-y-1.5">
            <a href="#" class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover text-white/80">
                <div class="w-8 flex justify-center"><i class="fa-solid fa-file-circle-check text-xl"></i></div>
                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Validasi Jurnal</span>
            </a>
            <a href="#" class="flex items-center px-5 py-4 rounded-2xl transition-all duration-300 menu-hover text-white/80">
                <div class="w-8 flex justify-center"><i class="fa-solid fa-clipboard-user text-xl"></i></div>
                <span class="ml-3 text-sm tracking-wide" x-show="sidebarOpen">Rekap Presensi</span>
            </a>
        </div>
    </div>
</div>