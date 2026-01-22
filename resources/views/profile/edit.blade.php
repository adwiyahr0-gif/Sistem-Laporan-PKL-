<x-app-layout>
    <div class="mb-10">
        <div class="flex items-center space-x-4">
            <div class="h-10 w-2 bg-indigo-600 rounded-full"></div>
            <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tighter">Pengaturan Profil</h2>
        </div>
        <p class="text-gray-500 font-medium ml-6 mt-1">Kelola identitas digital dan privasi akun Anda.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8 space-y-8">
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md">
                <div class="p-8 md:p-12">
                    <div class="flex items-center space-x-4 mb-10">
                        <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600">
                            <i class="fa-solid fa-id-card text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Informasi Pribadi</h3>
                    </div>
                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md">
                <div class="p-8 md:p-12">
                    <div class="flex items-center space-x-4 mb-10">
                        <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600">
                            <i class="fa-solid fa-key text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Keamanan Akun</h3>
                    </div>
                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-4 space-y-8">
            <div class="bg-[#1e293b] rounded-[2.5rem] p-8 text-white shadow-2xl relative overflow-hidden">
                <div class="absolute -right-5 -top-5 w-32 h-32 bg-indigo-500/10 rounded-full blur-3xl"></div>
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="relative mb-6">
                        <div class="w-24 h-24 rounded-3xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center shadow-xl">
                            <span class="text-4xl font-black text-white">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 border-4 border-[#1e293b] rounded-full animate-pulse"></div>
                    </div>
                    <h4 class="font-bold text-xl mb-1">{{ Auth::user()->name }}</h4>
                    <p class="text-indigo-300 text-xs mb-8 opacity-80">{{ Auth::user()->email }}</p>
                    <div class="w-full grid grid-cols-2 gap-3">
                        <div class="bg-white/5 p-4 rounded-3xl border border-white/10 text-center">
                            <p class="text-[9px] uppercase font-bold text-indigo-300 opacity-60">Status</p>
                            <p class="text-xs font-black text-green-400">AKTIF</p>
                        </div>
                        <div class="bg-white/5 p-4 rounded-3xl border border-white/10 text-center">
                            <p class="text-[9px] uppercase font-bold text-indigo-300 opacity-60">Level</p>
                            <p class="text-xs font-black">MAHASISWA</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-red-50/50 rounded-[2.5rem] p-8 border border-red-100">
                <div class="flex items-center space-x-3 mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-red-500"></i>
                    <h3 class="font-bold text-red-800 text-sm">Hapus Akun</h3>
                </div>
                <p class="text-xs text-red-600/70 mb-6 leading-relaxed">Tindakan ini tidak dapat dibatalkan.</p>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    <style>
        /* Memperbaiki tampilan form input di dalam partials */
        input[type="text"], input[type="email"], input[type="password"] {
            @apply block w-full px-5 py-4 mt-2 text-gray-700 bg-gray-50 border border-gray-100 rounded-2xl focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 !important;
        }
        label {
            @apply text-[10px] font-black uppercase tracking-widest text-gray-400 ml-1 !important;
        }
        button[type="submit"]:not(.bg-red-600) {
            @apply px-10 py-4 bg-indigo-600 text-white text-[10px] font-black uppercase tracking-widest rounded-2xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 hover:-translate-y-1 transition-all !important;
        }
    </style>
</x-app-layout>