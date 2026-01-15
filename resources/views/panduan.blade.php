<x-app-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Panduan & Berkas</h2>
        <p class="text-slate-500 text-sm">Unduh dokumen pendukung untuk keperluan administrasi PKL Anda.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:border-indigo-300 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-red-50 text-red-500 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-file-pdf text-xl"></i>
                </div>
                <button class="text-slate-300 group-hover:text-indigo-500 transition-colors">
                    <i class="fa-solid fa-download text-lg"></i>
                </button>
            </div>
            <h3 class="font-bold text-slate-800">Format Laporan PKL</h3>
            <p class="text-slate-400 text-xs mt-1 italic">PDF • 1.2 MB</p>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 hover:border-indigo-300 transition-all group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fa-solid fa-file-word text-xl"></i>
                </div>
                <button class="text-slate-300 group-hover:text-indigo-500 transition-colors">
                    <i class="fa-solid fa-download text-lg"></i>
                </button>
            </div>
            <h3 class="font-bold text-slate-800">Form Nilai Pembimbing Lapangan</h3>
            <p class="text-slate-400 text-xs mt-1 italic">DOCX • 500 KB</p>
        </div>
    </div>

    <div class="mt-10 bg-indigo-900 rounded-3xl p-8 text-white relative overflow-hidden">
        <div class="relative z-10">
            <h3 class="text-xl font-bold mb-2">Belum paham cara input laporan?</h3>
            <p class="text-indigo-200 text-sm mb-6">Tonton video tutorial singkat penggunaan sistem E-Laporan ini.</p>
            <button class="px-6 py-2.5 bg-white text-indigo-900 rounded-xl font-bold text-sm hover:bg-indigo-50 transition-all flex items-center gap-2">
                <i class="fa-solid fa-play"></i> Tonton Video
            </button>
        </div>
        <i class="fa-solid fa-video absolute -right-4 -bottom-4 text-9xl text-white/10 rotate-12"></i>
    </div>
</x-app-layout>