<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Kominfo Binjai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Transisi sidebar agar smooth */
        #sidebar { transition: all 0.3s ease-in-out; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800">

    <div class="flex min-h-screen overflow-hidden">
        <aside id="sidebar" class="w-72 bg-[#4F46E5] text-white flex-shrink-0 flex flex-col z-50 relative">
            <div class="p-8 flex flex-col items-center border-b border-white/10">
                <div class="w-24 h-24 bg-white rounded-full shadow-xl mb-4 flex items-center justify-center p-2 border-4 border-white/20">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Logo_Kota_Binjai.png/480px-Logo_Kota_Binjai.png" 
                         alt="Logo Binjai" class="w-14 h-auto object-contain">
                </div>
                <div class="text-center">
                    <h2 class="font-black text-sm tracking-tighter uppercase">Kominfo Binjai</h2>
                    <p class="text-[10px] text-indigo-200 font-bold tracking-widest uppercase mt-1">Portal Monitoring PKL</p>
                </div>
            </div>

            <nav class="flex-1 p-6 space-y-2 overflow-y-auto">
                <p class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em] mb-4 px-4 italic">Menu Utama</p>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.dashboard') ? 'bg-white text-indigo-600 shadow-md' : 'hover:bg-white/10 text-white' }} transition-all group">
                    <i class="fa-solid fa-chart-pie text-lg"></i>
                    <span class="text-sm font-bold">Dashboard Admin</span>
                </a>

                <a href="{{ route('admin.students.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.students.*') ? 'bg-white text-indigo-600 shadow-md' : 'hover:bg-white/10 text-white' }} transition-all">
                    <i class="fa-solid fa-users text-lg"></i>
                    <span class="text-sm font-bold">Data Mahasiswa</span>
                </a>

                <p class="text-[10px] font-black text-indigo-300 uppercase tracking-[0.2em] mt-8 mb-4 px-4 italic">Laporan & Absensi</p>

                <a href="{{ route('admin.jurnal.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.jurnal.*') ? 'bg-white text-indigo-600 shadow-md' : 'hover:bg-white/10 text-white' }} transition-all">
                    <i class="fa-solid fa-file-signature text-lg"></i>
                    <span class="text-sm font-bold">Validasi Jurnal</span>
                </a>

                <a href="{{ route('admin.presensi.index') }}" class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.presensi.*') ? 'bg-white text-indigo-600 shadow-md' : 'hover:bg-white/10 text-white' }} transition-all">
                    <i class="fa-solid fa-calendar-check text-lg"></i>
                    <span class="text-sm font-bold">Rekap Presensi</span>
                </a>
            </nav>

            <div class="p-6 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-3 px-4 py-4 bg-rose-500 hover:bg-rose-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest transition-all shadow-lg shadow-rose-500/30">
                        <i class="fa-solid fa-power-off"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 flex flex-col min-w-0 h-screen overflow-y-auto">
            <header class="h-20 bg-white border-b border-slate-100 flex items-center justify-between px-8 sticky top-0 z-40">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-slate-50 text-slate-400 hover:bg-indigo-50 hover:text-indigo-600 transition-all border border-slate-100 shadow-sm">
                        <i class="fa-solid fa-bars-staggered text-xl"></i>
                    </button>
                    <div class="hidden md:block">
                        <p class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest leading-none">Portal Monitoring</p>
                        <p class="text-sm font-black text-slate-800 uppercase tracking-tight">Admin Panel</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-black text-slate-800 leading-none">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest mt-1">Administrator</p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-black border-2 border-white shadow-sm">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <div class="p-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            // Cek kondisi lebar
            if (sidebar.classList.contains('w-72')) {
                sidebar.style.width = '0';
                sidebar.classList.remove('w-72');
                sidebar.classList.add('overflow-hidden');
            } else {
                sidebar.style.width = '18rem'; // w-72 setara 18rem
                sidebar.classList.add('w-72');
                sidebar.classList.remove('overflow-hidden');
            }
        }
    </script>
</body>
</html>