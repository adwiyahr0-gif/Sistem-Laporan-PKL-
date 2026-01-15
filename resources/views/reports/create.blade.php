<x-app-layout>
    <div class="min-h-screen bg-[#F8FAFC] py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            
            <div class="mb-8">
                <a href="{{ route('reports.index') }}" class="inline-flex items-center text-xs font-bold text-slate-400 uppercase tracking-widest hover:text-indigo-600 transition-colors group">
                    <div class="w-8 h-8 rounded-lg bg-white shadow-sm border border-slate-100 flex items-center justify-center mr-3 group-hover:bg-indigo-50 group-hover:border-indigo-100 transition-all">
                        <i class="fa-solid fa-arrow-left text-[10px]"></i>
                    </div>
                    Kembali ke Daftar
                </a>
            </div>

            <div class="bg-white/80 backdrop-blur-md overflow-hidden shadow-2xl shadow-slate-200/50 rounded-[2.5rem] border border-white">
                <div class="p-8 sm:p-12">
                    
                    <div class="text-center mb-10">
                        <div class="w-16 h-16 bg-indigo-600 text-white rounded-2xl flex items-center justify-center text-2xl mx-auto mb-4 shadow-lg shadow-indigo-200">
                            <i class="fa-solid fa-pen-nib"></i>
                        </div>
                        <h2 class="text-3xl font-black text-slate-800 tracking-tight">Buat Jurnal Baru</h2>
                        <p class="text-sm text-slate-500 mt-2 font-medium">Isi detail aktivitas magang Anda dengan jelas dan jujur.</p>
                    </div>

                    <form action="{{ route('reports.store') }}" method="POST" class="space-y-8">
                        @csrf
                        
                        <div class="group">
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-indigo-600 transition-colors">Pilih Tanggal Kegiatan</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-500">
                                    <i class="fa-solid fa-calendar-day"></i>
                                </div>
                                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" 
                                    class="w-full pl-12 pr-4 py-4 rounded-2xl border-slate-100 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 shadow-sm transition-all font-bold text-slate-700" required>
                            </div>
                            @error('tanggal') <p class="text-red-500 text-xs mt-2 ml-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="group">
                            <label class="block text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 ml-1 group-focus-within:text-indigo-600 transition-colors">Detail Kegiatan / Pekerjaan</label>
                            <textarea name="kegiatan" rows="6" placeholder="Misal: Melakukan maintenance server, mengembangkan modul laporan..."
                                class="w-full p-5 rounded-2xl border-slate-100 bg-slate-50/50 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 shadow-sm transition-all font-medium text-slate-600 leading-relaxed" required></textarea>
                            <div class="flex justify-between items-center mt-3 px-1">
                                <p class="text-[10px] text-slate-400 font-bold italic uppercase tracking-wider">Minimal 10 karakter</p>
                                <span class="text-[10px] text-slate-300 font-medium">Input deskripsi harian</span>
                            </div>
                            @error('kegiatan') <p class="text-red-500 text-xs mt-2 ml-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-indigo-200 transition-all transform hover:scale-[1.01] active:scale-[0.98] uppercase tracking-[0.2em] text-xs">
                                <i class="fa-solid fa-paper-plane mr-2"></i> Simpan Jurnal Kegiatan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <p class="text-center mt-8 text-[10px] font-bold text-slate-400 uppercase tracking-[0.3em]">
                &copy; 2026 E-Laporan PKL • Dinas Kominfo Binjai
            </p>
        </div>
    </div>
</x-app-layout>