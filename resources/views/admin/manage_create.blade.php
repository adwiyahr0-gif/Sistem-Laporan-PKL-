<x-admin-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Daftar Admin Baru</h2>
        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest mt-2">Buat akun akses administrator baru</p>
    </div>

    <div class="max-w-2xl bg-white rounded-[2.5rem] shadow-2xl p-10 border border-slate-100">
        <form action="{{ route('admin.manage.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Nama Lengkap</label>
                    <input type="text" name="name" class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-indigo-500 font-bold text-slate-700" required>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Alamat Email</label>
                    <input type="email" name="email" class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-indigo-500 font-bold text-slate-700" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Password</label>
                        <input type="password" name="password" class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-indigo-500 font-bold text-slate-700" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="w-full px-6 py-4 rounded-2xl bg-slate-50 border-none focus:ring-2 focus:ring-indigo-500 font-bold text-slate-700" required>
                    </div>
                </div>
                <div class="pt-4 flex gap-3">
                    <button type="submit" class="flex-1 bg-indigo-600 text-white py-4 rounded-2xl font-black uppercase tracking-[0.2em] text-[10px] hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200">
                        Simpan Akun Admin
                    </button>
                    <a href="{{ route('admin.manage') }}" class="px-8 py-4 bg-slate-100 text-slate-500 rounded-2xl font-black uppercase tracking-[0.2em] text-[10px] hover:bg-slate-200 transition-all text-center">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>