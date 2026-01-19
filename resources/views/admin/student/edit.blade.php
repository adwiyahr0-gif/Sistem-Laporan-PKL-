<x-admin-layout>
    <div class="max-w-4xl mx-auto space-y-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.students.index') }}" class="w-10 h-10 bg-white border border-slate-200 rounded-xl flex items-center justify-center text-slate-400 hover:text-[#4e5ecf] transition-all">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-black text-slate-800 tracking-tight">Edit Data Mahasiswa</h1>
                <p class="text-sm text-slate-500 mt-1">Perbarui informasi akun mahasiswa {{ $student->name }}.</p>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">
            <form action="{{ route('admin.students.update', $student->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $student->name) }}" required
                               class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all text-sm font-medium">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email', $student->email) }}" required
                               class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all text-sm font-medium">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Universitas</label>
                        <input type="text" name="universitas" value="{{ old('universitas', $student->universitas) }}" required
                               class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all text-sm font-medium">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Password Baru (Kosongkan jika tidak ganti)</label>
                        <input type="password" name="password" placeholder="Minimal 8 karakter"
                               class="w-full px-5 py-4 bg-slate-50 border border-slate-100 rounded-2xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all text-sm font-medium">
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="submit" class="px-10 py-4 bg-[#4e5ecf] hover:bg-[#3b4ab0] text-white rounded-2xl text-sm font-black uppercase tracking-widest transition-all shadow-lg shadow-indigo-100">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.students.index') }}" class="px-10 py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-2xl text-sm font-black uppercase tracking-widest transition-all">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>