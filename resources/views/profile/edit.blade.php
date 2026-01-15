<x-app-layout>
    <div class="mb-10 transition-all duration-500 transform">
        <div class="flex items-center space-x-4 mb-2">
            <div class="h-10 w-2 bg-indigo-600 rounded-full"></div>
            <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tighter">Pengaturan Profil</h2>
        </div>
        <p class="text-gray-500 font-medium ml-6">Kelola identitas digital dan privasi akun Anda dalam satu tempat.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <div class="lg:col-span-8 space-y-8">
            
            <div class="bg-white rounded-[3rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden group">
                <div class="p-1 bg-gradient-to-r from-indigo-500 to-purple-500"></div>
                <div class="p-8 md:p-12">
                    <div class="flex items-center justify-between mb-10">
                        <div class="flex items-center space-x-5">
                            <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600 shadow-inner group-hover:scale-110 transition-transform duration-500">
                                <i class="fa-solid fa-id-card text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Informasi Pribadi</h3>
                                <p class="text-xs font-black text-indigo-400 uppercase tracking-[0.2em]">Data Identitas Mahasiswa</p>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[3rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden group">
                <div class="p-1 bg-gradient-to-r from-amber-400 to-orange-500"></div>
                <div class="p-8 md:p-12">
                    <div class="flex items-center justify-between mb-10">
                        <div class="flex items-center space-x-5">
                            <div class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 shadow-inner group-hover:scale-110 transition-transform duration-500">
                                <i class="fa-solid fa-shield-halved text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">Keamanan Akun</h3>
                                <p class="text-xs font-black text-amber-500 uppercase tracking-[0.2em]">Proteksi Kata Sandi</p>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-4 space-y-8">
            
            <div class="bg-indigo-900 rounded-[3rem] p-8 text-white shadow-2xl relative overflow-hidden group">
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-all duration-700"></div>
                
                <div class="relative z-10 text-center">
                    <div class="inline-flex p-1 rounded-full bg-white/20 mb-6">
                        <div class="w-20 h-20 rounded-full bg-white flex items-center justify-center shadow-lg">
                             <span class="text-3xl font-black text-indigo-900">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                    <h4 class="font-black text-xl mb-1 uppercase tracking-tighter">{{ Auth::user()->name }}</h4>
                    <p class="text-indigo-300 text-xs font-bold tracking-widest uppercase mb-6">{{ Auth::user()->email }}</p>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white/10 p-4 rounded-3xl backdrop-blur-md border border-white/10">
                            <p class="text-[10px] uppercase font-bold text-indigo-200 mb-1">Status</p>
                            <p class="text-sm font-black">AKTIF</p>
                        </div>
                        <div class="bg-white/10 p-4 rounded-3xl backdrop-blur-md border border-white/10">
                            <p class="text-[10px] uppercase font-bold text-indigo-200 mb-1">Role</p>
                            <p class="text-sm font-black">PKL</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-red-50 rounded-[3rem] p-8 border border-red-100 group">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-12 h-12 bg-red-100 rounded-2xl flex items-center justify-center text-red-600 group-hover:animate-pulse">
                        <i class="fa-solid fa-circle-exclamation text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-red-800">Zona Bahaya</h3>
                    </div>
                </div>
                <p class="text-xs text-red-600/70 mb-6 font-medium leading-relaxed">Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen.</p>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Mempercantik input field */
        input[type="text"], input[type="email"], input[type="password"] {
            @apply block w-full px-5 py-4 mt-2 text-gray-700 bg-gray-50 border border-gray-200 rounded-2xl focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-300 !important;
        }

        /* Mempercantik label */
        label {
            @apply text-xs font-black uppercase tracking-widest text-gray-500 ml-1 !important;
        }

        /* Mempercantik tombol Save */
        button[type="submit"]:not(.bg-red-600) {
            @apply px-8 py-4 bg-indigo-600 text-white text-xs font-black uppercase tracking-[0.2em] rounded-2xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-indigo-300 transform hover:-translate-y-1 active:scale-95 transition-all duration-300 !important;
        }

        /* Mempercantik teks deskripsi di partials */
        .text-sm.text-gray-600 {
            @apply text-xs font-medium text-gray-400 mb-8 block !important;
        }
    </style>
</x-app-layout>