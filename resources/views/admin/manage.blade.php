<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight leading-none">Daftar Administrator</h2>
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest mt-2 opacity-70">Manajemen akses personil Kominfo Binjai</p>
        </div>
        <div class="flex items-center gap-4">
            <button type="button" id="btnTambahAdmin" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-indigo-200 transition-all duration-300 hover:shadow-xl hover:scale-105">
                <i class="fa-solid fa-plus mr-2"></i>Tambah Admin
            </button>
            <div class="w-12 h-12 rounded-2xl bg-indigo-600/10 text-indigo-600 flex items-center justify-center shadow-inner">
                <i class="fa-solid fa-user-shield text-xl"></i>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-emerald-500 text-white rounded-2xl font-bold text-xs uppercase tracking-widest shadow-lg shadow-emerald-100 flex items-center gap-3 animate-pulse">
        <i class="fa-solid fa-circle-check text-lg"></i>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error') || $errors->any())
    <div class="mb-6 p-4 bg-red-500 text-white rounded-2xl font-bold text-xs uppercase tracking-widest shadow-lg shadow-red-100 flex items-center gap-3">
        <i class="fa-solid fa-triangle-exclamation text-lg"></i>
        <span>{{ session('error') ?? 'Terjadi kesalahan validasi. Silakan cek kembali form.' }}</span>
    </div>
    @endif

    <div id="adminModal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-[2.5rem] shadow-2xl max-w-md w-full overflow-hidden transform transition-all">
            <div class="bg-gradient-to-br from-indigo-600 to-purple-600 px-8 py-6">
                <h3 class="text-xl font-black text-white uppercase tracking-tight">Tambah Administrator Baru</h3>
                <p class="text-xs font-bold text-indigo-100 uppercase tracking-widest mt-1">Form Pendaftaran Admin</p>
            </div>
            
            <form action="{{ route('admin.store') }}" method="POST" class="p-8 space-y-6">
                @csrf
                
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                           class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('name') ? 'border-red-300' : 'border-slate-100' }} focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all font-bold text-sm"
                           placeholder="Masukkan nama lengkap">
                    @error('name')
                        <p class="text-red-500 text-[10px] font-black uppercase mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                           class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('email') ? 'border-red-300' : 'border-slate-100' }} focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all font-bold text-sm"
                           placeholder="admin@kominfo.binjai.go.id">
                    @error('email')
                        <p class="text-red-500 text-[10px] font-black uppercase mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 rounded-xl border-2 {{ $errors->has('password') ? 'border-red-300' : 'border-slate-100' }} focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all font-bold text-sm"
                           placeholder="Minimal 8 karakter">
                    @error('password')
                        <p class="text-red-500 text-[10px] font-black uppercase mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required 
                           class="w-full px-4 py-3 rounded-xl border-2 border-slate-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition-all font-bold text-sm"
                           placeholder="Ulangi password">
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button" id="btnBatal"
                            class="flex-1 px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-black text-xs uppercase tracking-widest transition-all">
                        Batal
                    </button>
                    <button type="submit" 
                            class="flex-1 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-black text-xs uppercase tracking-widest shadow-lg shadow-indigo-200 transition-all">
                        <i class="fa-solid fa-check mr-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-indigo-100/50 overflow-hidden border border-slate-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 border-b border-slate-100">
                    <tr>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">No</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Profil Admin</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Kontak / Email</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Status Akses</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($admins as $index => $admin)
                    <tr class="hover:bg-indigo-50/40 transition-all duration-300">
                        <td class="px-8 py-6 text-sm font-black text-slate-300">{{ $index + 1 }}</td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white flex items-center justify-center font-black shadow-lg uppercase">
                                    {{ substr($admin->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-black text-slate-800 uppercase tracking-tight">{{ $admin->name }}</p>
                                    <p class="text-[9px] font-bold text-indigo-500 uppercase mt-1 bg-indigo-50 inline-block px-2 py-0.5 rounded-md">Administrator</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm font-bold text-slate-600">{{ $admin->email }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-600 rounded-lg text-[10px] font-black uppercase tracking-widest">Aktif</span>
                        </td>
                        <td class="px-8 py-6">
                            <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all">
                                    <i class="fa-solid fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center">
                            <p class="text-slate-400 font-bold uppercase text-xs tracking-widest">Data admin tidak ditemukan di database</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('adminModal');
            const btnTambah = document.getElementById('btnTambahAdmin');
            const btnBatal = document.getElementById('btnBatal');

            // Fungsi Buka Modal
            function openModal() {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Lock scroll
            }

            // Fungsi Tutup Modal
            function closeModal() {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto'; // Unlock scroll
            }

            // Event Listeners
            if(btnTambah) btnTambah.addEventListener('click', openModal);
            if(btnBatal) btnBatal.addEventListener('click', closeModal);

            // Tutup jika klik luar area modal
            window.addEventListener('click', function(e) {
                if (e.target === modal) closeModal();
            });

            // Otomatis buka jika ada error validasi
            @if($errors->any())
                openModal();
            @endif
        });
    </script>
</x-admin-layout>