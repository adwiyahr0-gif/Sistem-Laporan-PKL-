<x-app-layout>
    <div class="py-12 px-4 sm:px-6 lg:px-8 max-w-2xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight uppercase">Edit Laporan Kegiatan</h1>
            <a href="{{ route('reports.index') }}" class="inline-flex items-center text-xs font-bold text-slate-400 uppercase tracking-[0.2em] hover:text-indigo-600 transition-colors">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden">
            <form action="{{ route('reports.update', $report->id) }}" method="POST" class="p-8 sm:p-10 space-y-8">
                @csrf
                @method('PATCH')
                
                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal" value="{{ $report->tanggal }}" required 
                        class="w-full bg-slate-50 border-none rounded-2xl px-6 py-4 text-sm font-bold text-slate-700 focus:ring-4 focus:ring-indigo-100 transition-all outline-none">
                </div>

                <div class="space-y-2">
                    <label class="block text-[11px] font-black text-slate-400 uppercase tracking-[0.2em] ml-2">Detail Pekerjaan</label>
                    <textarea name="kegiatan" rows="6" required 
                        class="w-full bg-slate-50 border-none rounded-[2rem] px-6 py-4 text-sm font-medium text-slate-600 leading-relaxed focus:ring-4 focus:ring-indigo-100 transition-all outline-none">{{ $report->kegiatan }}</textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-indigo-600 text-white py-5 rounded-[1.5rem] text-xs font-black uppercase tracking-[0.3em] hover:bg-indigo-700 shadow-lg shadow-indigo-100 hover:shadow-indigo-200 transition-all transform active:scale-[0.98]">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>