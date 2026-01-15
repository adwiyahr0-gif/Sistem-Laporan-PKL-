<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Harian PKL - Kominfo Binjai') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ 
        openModal: false, 
        openEditModal: false, 
        reportId: null, 
        reportTanggal: '', 
        reportKegiatan: '' 
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-sm flex justify-between items-center" role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="font-bold" @click="$el.parentElement.remove()">&times;</button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-t-4 border-indigo-900">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 uppercase tracking-tight">Daftar Kegiatan Harian</h3>
                        <p class="text-xs text-indigo-600 font-bold">Mahasiswa: {{ Auth::user()->name }}</p>
                    </div>
                    
                    <div class="flex gap-2">
                        <a href="{{ route('reports.export-pdf') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-bold text-xs text-white uppercase hover:bg-red-700 transition shadow-sm">
                            <i class="fa-solid fa-file-pdf mr-2"></i> PDF
                        </a>

                        <button type="button" @click="openModal = true" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-bold text-xs text-white uppercase hover:bg-indigo-700 transition shadow-sm">
                            <i class="fa-solid fa-plus mr-2"></i> Tambah Laporan
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto border rounded-lg">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 border-b text-[10px] uppercase font-bold text-gray-500 tracking-wider">
                                <th class="p-4">Tanggal</th>
                                <th class="p-4">Kegiatan / Pekerjaan</th>
                                <th class="p-4">Status</th>
                                <th class="p-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($reports as $report)
                            <tr class="hover:bg-blue-50/50 transition">
                                <td class="p-4 text-sm font-semibold text-gray-700 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($report->tanggal)->translatedFormat('d F Y') }}
                                </td>
                                <td class="p-4 text-sm text-gray-600 leading-relaxed">
                                    {{ $report->kegiatan }}
                                </td>
                                <td class="p-4">
                                    <span class="px-2 py-1 text-[10px] font-bold rounded {{ $report->status == 'disetujui' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700' }}">
                                        {{ strtoupper($report->status) }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <div class="flex justify-center gap-3">
                                        <button type="button" 
                                            @click="
                                                openEditModal = true; 
                                                reportId = '{{ $report->id }}'; 
                                                reportTanggal = '{{ $report->tanggal }}'; 
                                                reportKegiatan = `{{ $report->kegiatan }}`;
                                            " 
                                            class="text-indigo-600 hover:text-indigo-900 font-bold text-[10px] uppercase">
                                            Edit
                                        </button>

                                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Hapus data?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-[10px] uppercase">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-10 text-center text-gray-400 italic">Belum ada kegiatan yang dicatat.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div x-show="openModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" x-cloak>
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="fixed inset-0 bg-gray-900 bg-opacity-60 transition-opacity" @click="openModal = false"></div>
                <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden border-t-8 border-indigo-600 transform transition-all">
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="p-6 border-b flex justify-between items-center bg-gray-50">
                            <h3 class="text-lg font-extrabold text-indigo-900 uppercase">Input Kegiatan Harian</h3>
                            <button type="button" @click="openModal = false" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Detail Pekerjaan</label>
                                <textarea name="kegiatan" rows="5" placeholder="Tuliskan detail pekerjaan Anda hari ini..." class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                            </div>
                        </div>
                        <div class="p-6 bg-gray-50 flex flex-row-reverse gap-3">
                            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-bold text-xs rounded-lg hover:bg-indigo-700 transition uppercase shadow-md">Simpan Laporan</button>
                            <button type="button" @click="openModal = false" class="px-6 py-2 bg-white border border-gray-300 text-gray-700 font-bold text-xs rounded-lg hover:bg-gray-50 transition uppercase">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div x-show="openEditModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" x-cloak>
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="fixed inset-0 bg-gray-900 bg-opacity-60 transition-opacity" @click="openEditModal = false"></div>
                <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden border-t-8 border-green-600 transform transition-all">
                    <form :action="'/reports/' + reportId" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-6 border-b flex justify-between items-center bg-gray-50">
                            <h3 class="text-lg font-extrabold text-green-900 uppercase">Edit Kegiatan Harian</h3>
                            <button type="button" @click="openEditModal = false" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal" x-model="reportTanggal" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500" required>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-gray-500 uppercase mb-1">Detail Pekerjaan</label>
                                <textarea name="kegiatan" rows="5" x-model="reportKegiatan" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-green-500 focus:ring-green-500" required></textarea>
                            </div>
                        </div>
                        <div class="p-6 bg-gray-50 flex flex-row-reverse gap-3">
                            <button type="submit" class="px-6 py-2 bg-green-600 text-white font-bold text-xs rounded-lg hover:bg-green-700 transition uppercase shadow-md">Simpan Perubahan</button>
                            <button type="button" @click="openEditModal = false" class="px-6 py-2 bg-white border border-gray-300 text-gray-700 font-bold text-xs rounded-lg hover:bg-gray-50 transition uppercase">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <style> [x-cloak] { display: none !important; } </style>
</x-app-layout>