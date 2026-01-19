<x-admin-layout>
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-black text-slate-800">Data Mahasiswa PKL</h1>
            <a href="{{ route('admin.students.create') }}" class="px-5 py-2.5 bg-[#4e5ecf] text-white rounded-xl text-sm font-bold hover:bg-blue-700 transition">
                + Tambah Mahasiswa
            </a>
        </div>
        
        <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-slate-400">Mahasiswa</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-slate-400">Email</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-slate-400 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($students as $student)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="px-8 py-5 font-bold text-slate-700">{{ $student->name }}</td>
                        <td class="px-8 py-5 text-sm text-slate-500">{{ $student->email }}</td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex justify-end gap-2">
                                <button class="p-2 text-amber-500 hover:bg-amber-50 rounded-lg"><i class="fa-solid fa-pen"></i></button>
                                <button class="p-2 text-red-500 hover:bg-red-50 rounded-lg"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-8 py-10 text-center text-slate-400 italic">Belum ada data mahasiswa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>