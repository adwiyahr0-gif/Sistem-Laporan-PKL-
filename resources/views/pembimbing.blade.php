<x-app-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Daftar Pembimbing</h2>
        <p class="text-slate-500 text-sm">Pembimbing teknis dan lapangan untuk mahasiswa PKL di Kominfo Binjai.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex flex-col items-center text-center">
                <div class="relative">
                    <div class="w-24 h-24 rounded-2xl bg-indigo-100 flex items-center justify-center text-indigo-600 mb-4 overflow-hidden">
                        <i class="fa-solid fa-user-tie text-4xl"></i>
                    </div>
                    <div class="absolute bottom-2 right-0 w-6 h-6 bg-emerald-500 border-4 border-white rounded-full"></div>
                </div>
                
                <h3 class="text-lg font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Budi Santoso, S.Kom</h3>
                <p class="text-[10px] font-black text-indigo-500 uppercase tracking-widest mb-4">Pembimbing IT / Jaringan</p>
                
                <div class="w-full space-y-2 pt-4 border-t border-slate-50">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-400">NIP</span>
                        <span class="text-slate-700 font-semibold">19850101 201001 1 002</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-400">Ruangan</span>
                        <span class="text-slate-700 font-semibold">Bidang Aptika</span>
                    </div>
                </div>

                <div class="flex gap-2 mt-6 w-full">
                    <a href="https://wa.me/628123456789" target="_blank" class="flex-1 py-2 bg-emerald-50 text-emerald-600 rounded-xl text-xs font-bold hover:bg-emerald-500 hover:text-white transition-all text-center">
                        <i class="fa-brands fa-whatsapp mr-1"></i> WhatsApp
                    </a>
                    <button class="flex-1 py-2 bg-slate-50 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-100 transition-all text-center">
                        <i class="fa-solid fa-envelope mr-1"></i> Email
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 group">
            <div class="flex flex-col items-center text-center">
                <div class="relative">
                    <div class="w-24 h-24 rounded-2xl bg-rose-100 flex items-center justify-center text-rose-600 mb-4 overflow-hidden">
                        <i class="fa-solid fa-user-ninja text-4xl"></i>
                    </div>
                    <div class="absolute bottom-2 right-0 w-6 h-6 bg-emerald-500 border-4 border-white rounded-full"></div>
                </div>
                
                <h3 class="text-lg font-bold text-slate-800 group-hover:text-indigo-600 transition-colors">Siti Aminah, M.Kom</h3>
                <p class="text-[10px] font-black text-rose-500 uppercase tracking-widest mb-4">Pembimbing Media / Humas</p>
                
                <div class="w-full space-y-2 pt-4 border-t border-slate-50">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-400">NIP</span>
                        <span class="text-slate-700 font-semibold">19900215 201503 2 001</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-slate-400">Ruangan</span>
                        <span class="text-slate-700 font-semibold">Informasi Publik</span>
                    </div>
                </div>

                <div class="flex gap-2 mt-6 w-full">
                    <a href="#" class="flex-1 py-2 bg-emerald-50 text-emerald-600 rounded-xl text-xs font-bold hover:bg-emerald-500 hover:text-white transition-all text-center">
                        <i class="fa-brands fa-whatsapp mr-1"></i> WhatsApp
                    </a>
                    <button class="flex-1 py-2 bg-slate-50 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-100 transition-all text-center">
                        <i class="fa-solid fa-envelope mr-1"></i> Email
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-slate-50 rounded-3xl p-6 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-center opacity-60">
            <div class="w-16 h-16 rounded-full bg-slate-200 flex items-center justify-center text-slate-400 mb-4">
                <i class="fa-solid fa-plus text-2xl"></i>
            </div>
            <p class="text-sm font-bold text-slate-400">Pembimbing Lainnya<br><span class="text-[10px] font-normal italic font-medium">Coming Soon</span></p>
        </div>

    </div>

    <div class="mt-8 p-4 bg-amber-50 border border-amber-100 rounded-2xl flex gap-4 items-center">
        <div class="w-10 h-10 bg-amber-100 text-amber-600 rounded-xl flex-shrink-0 flex items-center justify-center text-lg">
            <i class="fa-solid fa-lightbulb"></i>
        </div>
        <p class="text-xs text-amber-800 leading-relaxed">
            <strong>Catatan:</strong> Silakan hubungi pembimbing sesuai dengan bidang yang ditugaskan kepada Anda. Gunakan bahasa yang sopan saat menghubungi melalui WhatsApp.
        </p>
    </div>
</x-app-layout>