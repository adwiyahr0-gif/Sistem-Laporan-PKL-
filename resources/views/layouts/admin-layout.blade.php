<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Kominfo Binjai</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 font-sans">
    <div class="flex min-h-screen">
        <aside class="w-72 bg-[#4e5ecf] text-white p-6 hidden md:flex flex-col fixed h-full">
            <div class="mb-10 px-4">
                <h2 class="font-black text-xl tracking-tighter uppercase">Kominfo Binjai</h2>
                <p class="text-[10px] opacity-60 font-bold uppercase tracking-widest">Portal Monitoring PKL</p>
            </div>

            <nav class="flex-1 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 p-4 {{ request()->routeIs('admin.dashboard') ? 'bg-white text-[#4e5ecf]' : 'hover:bg-white/10' }} rounded-2xl transition font-bold">
                    <i class="fa-solid fa-chart-pie"></i> Dashboard Admin
                </a>

                <a href="{{ route('admin.students.index') }}" class="flex items-center gap-3 p-4 {{ request()->routeIs('admin.students.*') ? 'bg-white text-[#4e5ecf]' : 'hover:bg-white/10' }} rounded-2xl transition font-bold">
                    <i class="fa-solid fa-users"></i> Data Mahasiswa
                </a>
            </nav>
        </aside>

        <div class="flex-1 md:ml-72 flex flex-col min-h-screen">
            <header class="p-6 flex justify-end items-center gap-4 bg-white shadow-sm">
                <div class="text-right">
                    <p class="text-sm font-black text-slate-800">{{ Auth::user()->name }}</p>
                    <p class="text-[10px] text-slate-400 font-bold uppercase">Administrator</p>
                </div>
                <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
            </header>

            <main class="p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>