<x-admin-layout>
    <div class="max-w-4xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-black text-slate-800 tracking-tight">Tambah Mahasiswa Baru</h1>
                <p class="text-sm text-slate-500 mt-1">Daun akun akses untuk mahasiswa PKL baru.</p>
            </div>
            <a href="{{ route('admin.students.index') }}" class="flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-xl text-xs font-bold hover:bg-slate-50 transition-all shadow-sm">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-xl shadow-slate-200/50 overflow-hidden">
            <form action="{{ route('admin.students.store') }}" method="POST" class="p-8 md:p-12 space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                        <div class="relative">
                            <i class="fa-solid fa-user absolute left-5 top-1/2 -translate-y-1/2 text-slate-300"></i>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama mahasiswa" 
                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border-none rounded-2xl focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-700" required>
                        </div>
                        @error('name') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Asal Kampus / Sekolah</label>
                        <div class="relative">
                            <i class="fa-solid fa-school absolute left-5 top-1/2 -translate-y-1/2 text-slate-300"></i>
                            <input type="text" name="universitas" value="{{ old('universitas') }}" placeholder="Misal: Universitas Sumatera Utara" 
                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border-none rounded-2xl focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-700">
                        </div>
                        @error('universitas') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Alamat Email (Username)</label>
                        <div class="relative">
                            <i class="fa-solid fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-300"></i>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="mahasiswa@email.com" 
                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border-none rounded-2xl focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-700" required>
                        </div>
                        @error('email') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Password Akses</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-300"></i>
                            <input type="password" name="password" placeholder="Minimal 8 karakter" 
                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border-none rounded-2xl focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-700" required>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Konfirmasi Password</label>
                        <div class="relative">
                            <i class="fa-solid fa-circle-check absolute left-5 top-1/2 -translate-y-1/2 text-slate-300"></i>
                            <input type="password" name="password_confirmation" placeholder="Ulangi password" 
                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border-none rounded-2xl focus:ring-4 focus:ring-indigo-500/10 transition-all font-bold text-slate-700" required>
                        </div>
                        @error('password') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-50 flex justify-end">
                    <button type="submit" class="px-10 py-4 bg-[#4e5ecf] hover:bg-indigo-700 text-white font-black rounded-2xl shadow-xl shadow-indigo-100 transition-all transform hover:scale-[1.02] active:scale-[0.98] uppercase tracking-widest text-xs">
                        <i class="fa-solid fa-save mr-2"></i> Simpan Data Mahasiswa
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>