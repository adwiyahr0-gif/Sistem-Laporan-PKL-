<x-admin-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight leading-none">Data Mahasiswa PKL</h2>
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-widest mt-2 opacity-70">Kelola akun dan informasi mahasiswa yang sedang magang.</p>
        </div>
        <div class="flex items-center gap-4">
            <button type="button" id="btnTambahMahasiswa" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-indigo-200 transition-all duration-300 hover:shadow-xl hover:scale-105">
                <i class="fa-solid fa-plus mr-2"></i>Tambah Mahasiswa
            </button>
        </div>
    </div>

    @if(session('success'))
    <div class="mb-6 p-4 bg-emerald-500 text-white rounded-2xl font-bold text-xs uppercase tracking-widest shadow-lg shadow-emerald-100 flex items-center gap-3">
        <i class="fa-solid fa-circle-check text-lg"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-[2.5rem] shadow-2xl shadow-indigo-100/50 overflow-hidden border border-slate-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 border-b border-slate-100">
                    <tr>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">No</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Mahasiswa</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Email</th>
                        <th class="px-8 py-6 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($students as $index => $student)
                    <tr class="hover:bg-indigo-50/40 transition-all duration-300">
                        <td class="px-8 py-6 text-sm font-black text-slate-300">{{ $index + 1 }}</td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-black shadow-sm uppercase">
                                    {{ substr($student->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-sm font-black text-slate-800 uppercase tracking-tight">{{ $student->name }}</p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase">{{ $student->universitas ?? 'Tanpa Instansi' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-6">
                            <span class="text-sm font-bold text-slate-600">{{ $student->email }}</span>
                        </td>
                        <td class="px-8 py-6">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.students.edit', $student->id) }}" class="p-2 bg-amber-100 hover:bg-amber-200 text-amber-600 rounded-xl transition-all">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" id="form-delete-{{ $student->id }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('{{ $student->id }}')" class="p-2 bg-red-100 hover:bg-red-200 text-red-600 rounded-xl transition-all">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-12 text-center text-slate-400 font-bold uppercase text-xs tracking-widest">
                            Belum ada data mahasiswa.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Handle Tombol Tambah (Redirect ke halaman create)
            const btnTambah = document.getElementById('btnTambahMahasiswa');
            if(btnTambah) {
                btnTambah.addEventListener('click', function() {
                    window.location.href = "{{ route('admin.students.create') }}";
                });
            }

            // 2. Handle Konfirmasi Hapus
            window.confirmDelete = function(id) {
                if (confirm('Yakin ingin menghapus mahasiswa ini? Menghapus mahasiswa akan otomatis menghapus seluruh data laporan dan absensi mereka.')) {
                    document.getElementById('form-delete-' + id).submit();
                }
            }
        });
    </script>
</x-admin-layout>