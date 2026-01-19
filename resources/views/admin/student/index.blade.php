<x-admin-layout>
    <div class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-800 tracking-tight">Data Mahasiswa PKL</h1>
                <p class="text-sm text-slate-500 mt-1">Kelola akun dan informasi mahasiswa yang sedang magang.</p>
            </div>
            <a href="{{ route('admin.students.create') }}" class="px-6 py-3 bg-[#4e5ecf] hover:bg-[#3b4ab0] text-white rounded-2xl text-xs font-bold transition-all shadow-lg shadow-indigo-200 flex items-center gap-2 w-fit">
                <i class="fa-solid fa-plus"></i> Tambah Mahasiswa
            </a>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50/50">
                        <tr>
                            <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Mahasiswa</th>
                            <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400">Email</th>
                            <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($students as $student)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-black">
                                        {{ strtoupper(substr($student->name, 0, 1)) }}
                                    </div>
                                    <p class="text-sm font-bold text-slate-800">{{ $student->name }}</p>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-sm text-slate-600">{{ $student->email }}</td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.students.edit', $student->id) }}" class="p-2 text-amber-500 hover:bg-amber-50 rounded-lg transition-all">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Hapus data mahasiswa ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-8 py-10 text-center text-slate-400 text-sm italic">Belum ada data mahasiswa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>