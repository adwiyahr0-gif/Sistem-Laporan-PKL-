<x-app-layout>
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
    </div>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-indigo-50/30 to-slate-50 py-8 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-7xl mx-auto">
            
            <div class="mb-10 animate-slide-down">
                <h1 class="text-4xl font-black tracking-tight uppercase mb-2">
                    <span class="text-slate-800">PANDUAN &</span> 
                    <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500 bg-clip-text text-transparent animate-gradient-flow">BERKAS</span>
                </h1>
                <p class="text-slate-500 font-medium">Unduh dokumen pendukung untuk keperluan administrasi PKL Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="group relative bg-gradient-to-br from-white to-red-50/30 rounded-3xl border border-red-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-red-500/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.1s;">
                    <div class="relative p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-16 h-16 bg-red-500/10 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                                <i class="fa-solid fa-file-pdf text-red-500 text-3xl"></i>
                            </div>
                            <div class="flex items-center gap-2 bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold">
                                PDF
                            </div>
                        </div>
                        
                        <h3 class="text-2xl font-black text-slate-800 mb-2 uppercase tracking-tight">Format Laporan PKL</h3>
                        <p class="text-sm text-slate-500 mb-6">Template resmi untuk membuat laporan harian PKL yang terstruktur</p>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">1.2 MB</span>
                            <a href="{{ asset('berkas/format-laporan-pkl.pdf') }}" download="format-laporan-pkl.pdf" class="group/btn relative px-6 py-3 bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg transition-all duration-300 hover:scale-105 overflow-hidden">
                                <span class="relative z-10 flex items-center gap-2">
                                    <i class="fa-solid fa-download"></i> Download
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="group relative bg-gradient-to-br from-white to-blue-50/30 rounded-3xl border border-blue-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.2s;">
                    <div class="relative p-8">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-16 h-16 bg-blue-500/10 rounded-2xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                                <i class="fa-solid fa-file-word text-blue-500 text-3xl"></i>
                            </div>
                            <div class="flex items-center gap-2 bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-bold">
                                DOCX
                            </div>
                        </div>
                        
                        <h3 class="text-2xl font-black text-slate-800 mb-2 uppercase tracking-tight">Form Nilai Pembimbing</h3>
                        <p class="text-sm text-slate-500 mb-6">Formulir penilaian dari pembimbing lapangan untuk evaluasi PKL</p>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">500 KB</span>
                            <a href="{{ asset('berkas/form-nilai-pembimbing.docx') }}" download="form-nilai-pembimbing.docx" class="group/btn relative px-6 py-3 bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg transition-all duration-300 hover:scale-105 overflow-hidden">
                                <span class="relative z-10 flex items-center gap-2">
                                    <i class="fa-solid fa-download"></i> Download
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative bg-gradient-to-br from-indigo-900 via-purple-900 to-indigo-900 rounded-3xl p-8 md:p-12 text-white shadow-2xl overflow-hidden group hover:shadow-3xl transition-all duration-500 animate-slide-up" style="animation-delay: 0.3s;">
                <div class="relative z-10 max-w-4xl">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/20">
                            <i class="fa-solid fa-graduation-cap text-yellow-400 text-3xl"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-black uppercase tracking-tight mb-1">Belum Paham Cara Input Laporan?</h2>
                            <p class="text-indigo-200 text-sm">Tonton video tutorial singkat penggunaan sistem E-Laporan ini.</p>
                        </div>
                    </div>

                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="group/video inline-flex items-center gap-3 px-8 py-4 bg-white text-indigo-900 font-black text-sm uppercase tracking-wider rounded-2xl shadow-xl hover:bg-gray-50 transition-all duration-300 hover:scale-105 overflow-hidden">
                        <div class="relative z-10 flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-play text-white"></i>
                            </div>
                            <span>Tonton Video Tutorial</span>
                        </div>
                    </a>
                </div>
                
                <div class="absolute right-0 bottom-0 opacity-10 group-hover:scale-110 transition-transform duration-700">
                    <i class="fa-solid fa-play text-[200px]"></i>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>