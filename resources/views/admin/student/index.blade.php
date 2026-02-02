<x-admin-layout>
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-slate-800 tracking-tighter uppercase">Data Mahasiswa PKL</h1>
            <p class="text-slate-500 font-medium">Kelola akun dan informasi mahasiswa yang sedang magang.</p>
        </div>

        <div class="flex flex-col md:flex-row items-center gap-3">
            <form action="{{ route('admin.students.index') }}" method="GET" class="relative group">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Cari nama mahasiswa..." 
                    class="w-full md:w-64 pl-12 pr-10 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-bold focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-[#4e5ecf] transition-all shadow-sm"
                >
                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#4e5ecf] transition-colors">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                @if(request('search'))
                    <a href="{{ route('admin.students.index') }}" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-300 hover:text-rose-500 transition-colors">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </a>
                @endif
            </form>

            <a href="{{ route('admin.students.create') }}" class="w-full md:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#4e5ecf] hover:bg-[#3f4db3] text-white rounded-2xl text-[11px] font-black uppercase transition-all shadow-lg shadow-indigo-200">
                <i class="fa-solid fa-plus text-sm"></i> Tambah Mahasiswa
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500 text-white rounded-2xl font-bold shadow-lg flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest w-16">No</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest">Mahasiswa</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest">Email</th>
                    <th class="p-6 text-[10px] font-black uppercase text-slate-400 tracking-widest text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($students as $student)
                <tr class="hover:bg-slate-50/30 transition-colors">
                    <td class="p-6 text-sm font-bold text-slate-400">
                        {{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
                    </td>
                    <td class="p-6">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-indigo-100 text-[#4e5ecf] rounded-xl flex items-center justify-center font-black uppercase">
                                {{ substr($student->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-black text-slate-800">{{ $student->name }}</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase">{{ $student->universitas ?? 'Tanpa Instansi' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-6">
                        <span class="text-sm font-bold text-slate-600">{{ $student->email }}</span>
                    </td>
                    <td class="p-6">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.students.edit', $student->id) }}" class="p-2.5 bg-amber-50 text-amber-500 hover:bg-amber-500 hover:text-white rounded-xl transition-all border border-amber-100">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Hapus mahasiswa ini dan seluruh datanya?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2.5 bg-rose-50 text-rose-500 hover:bg-rose-500 hover:text-white rounded-xl transition-all border border-rose-100">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-20 text-center">
                        <div class="flex flex-col items-center justify-center gap-3">
                            <div class="w-16 h-16 bg-slate-50 text-slate-200 rounded-full flex items-center justify-center text-2xl">
                                <i class="fa-solid fa-user-slash"></i>
                            </div>
                            <p class="text-slate-400 font-bold italic">
                                {{ request('search') ? 'Mahasiswa dengan nama "'.request('search').'" tidak ditemukan.' : 'Belum ada data mahasiswa.' }}
                            </p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-8 py-6 border-t border-slate-50 bg-slate-50/30">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">
                    Menampilkan {{ $students->firstItem() ?? 0 }} sampai {{ $students->lastItem() ?? 0 }} dari {{ $students->total() }} mahasiswa
                </p>
                <div class="custom-pagination">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-pagination nav > div:first-child { display: none; }
        .custom-pagination nav span[aria-current="page"] span {
            background-color: #4e5ecf !important;
            color: white !important;
            border-radius: 12px;
            font-weight: 900;
            padding: 8px 16px !important;
        }
        .custom-pagination nav a, .custom-pagination nav span {
            border-radius: 12px;
            font-weight: 800;
            font-size: 11px;
            padding: 8px 16px !important;
            color: #64748b !important;
            border: 1px solid #f1f5f9 !important;
            background-color: white;
            transition: all 0.2s ease;
        }
    </style>
</x-admin-layout>