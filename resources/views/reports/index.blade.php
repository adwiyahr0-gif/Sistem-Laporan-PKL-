<x-app-layout>
    <!-- Animated background particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-indigo-300 rounded-full animate-float-1" style="top: 10%; left: 8%;"></div>
        <div class="absolute w-3 h-3 bg-blue-300 rounded-full animate-float-2" style="top: 20%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-purple-300 rounded-full animate-float-3" style="top: 60%; left: 12%;"></div>
        <div class="absolute w-3 h-3 bg-indigo-200 rounded-full animate-float-4" style="top: 75%; left: 88%;"></div>
        <div class="absolute w-2 h-2 bg-blue-200 rounded-full animate-float-5" style="top: 45%; left: 78%;"></div>
    </div>

    <div class="min-h-screen bg-white py-8 px-4 sm:px-6 lg:px-12 relative z-10">
        
        <!-- Header Section -->
        <div class="max-w-[1600px] mx-auto mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6 animate-slide-down">
            <div>
                <h1 class="text-4xl font-bold text-slate-800 tracking-tight mb-2">LAPORAN KEGIATAN HARIAN</h1>
                <p class="text-slate-600 font-medium">Monitor dan kelola progres magang Anda secara sistematis</p>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('reports.export-pdf') }}" target="_blank" class="group inline-flex items-center px-5 py-3 bg-white border-2 border-slate-200 text-slate-700 rounded-2xl text-xs font-semibold uppercase tracking-wide hover:border-red-300 hover:bg-red-50 hover:text-red-600 transition-all shadow-sm hover:shadow-md hover:scale-105">
                    <i class="fa-solid fa-file-pdf mr-2 text-red-500 group-hover:scale-110 transition-transform"></i> Cetak PDF
                </a>
                <a href="{{ route('reports.create') }}" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-2xl text-xs font-semibold uppercase tracking-wide hover:from-indigo-700 hover:to-purple-700 shadow-lg shadow-indigo-500/30 hover:shadow-xl hover:shadow-indigo-500/40 transition-all transform hover:scale-105 active:scale-95">
                    <i class="fa-solid fa-plus mr-2 group-hover:rotate-90 transition-transform duration-300"></i> Tambah Laporan
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @php
                $stats = [
                    [
                        'label' => 'Total Laporan', 
                        'value' => $reports->total(), 
                        'icon' => 'fa-folder-open', 
                        'gradient' => 'from-indigo-500 to-purple-600',
                        'bg' => 'from-indigo-500/10 to-purple-600/10',
                        'delay' => '0.1s'
                    ],
                    [
                        'label' => 'Disetujui', 
                        'value' => \App\Models\Report::where('user_id', Auth::id())->where('status', 'disetujui')->count(), 
                        'icon' => 'fa-circle-check', 
                        'gradient' => 'from-emerald-500 to-green-600',
                        'bg' => 'from-emerald-500/10 to-green-600/10',
                        'delay' => '0.2s'
                    ],
                    [
                        'label' => 'Menunggu', 
                        'value' => \App\Models\Report::where('user_id', Auth::id())->where('status', 'pending')->count(), 
                        'icon' => 'fa-clock', 
                        'gradient' => 'from-amber-500 to-orange-600',
                        'bg' => 'from-amber-500/10 to-orange-600/10',
                        'delay' => '0.3s'
                    ],
                ];
            @endphp
            @foreach($stats as $stat)
            <div class="group relative bg-white p-8 rounded-3xl border-2 border-slate-100 shadow-sm hover:shadow-xl hover:border-slate-200 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: {{ $stat['delay'] }}">
                <div class="absolute inset-0 bg-gradient-to-br {{ $stat['bg'] }} opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative flex items-center gap-6">
                    <div class="w-16 h-16 bg-gradient-to-br {{ $stat['gradient'] }} rounded-2xl flex items-center justify-center text-white text-2xl shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <i class="fa-solid {{ $stat['icon'] }}"></i>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">{{ $stat['label'] }}</p>
                        <p class="text-4xl font-bold text-slate-800 group-hover:scale-110 transition-transform duration-300 inline-block">{{ $stat['value'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Table Section -->
        <div class="max-w-[1600px] mx-auto bg-white rounded-3xl border-2 border-slate-100 shadow-lg overflow-hidden animate-slide-up" style="animation-delay: 0.4s;">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gradient-to-r from-slate-50 to-slate-100/50 border-b-2 border-slate-200">
                            <th class="px-8 py-6 text-xs font-bold text-slate-600 uppercase tracking-wide">Tanggal & Hari</th>
                            <th class="px-8 py-6 text-xs font-bold text-slate-600 uppercase tracking-wide">Detail Kegiatan</th>
                            <th class="px-8 py-6 text-xs font-bold text-slate-600 uppercase tracking-wide text-center">Status Laporan</th>
                            <th class="px-8 py-6 text-xs font-bold text-slate-600 uppercase tracking-wide text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($reports as $index => $report)
                        <tr class="hover:bg-slate-50 transition-all duration-300 group animate-fade-in" style="animation-delay: {{ 0.5 + ($index * 0.05) }}s;">
                            <td class="px-8 py-7 whitespace-nowrap">
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-slate-800 tracking-tight">{{ \Carbon\Carbon::parse($report->tanggal)->translatedFormat('d F Y') }}</span>
                                    <span class="text-xs font-semibold text-indigo-500 uppercase mt-1 tracking-wide">{{ \Carbon\Carbon::parse($report->tanggal)->translatedFormat('l') }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-7">
                                <p class="text-sm text-slate-700 leading-relaxed max-w-2xl font-medium group-hover:text-slate-900 transition-colors">
                                    {{ $report->kegiatan }}
                                </p>
                            </td>
                            <td class="px-8 py-7 text-center">
                                @if($report->status == 'disetujui' || $report->status == 'approved')
                                    <span class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-emerald-50 to-green-50 text-green-700 text-xs font-semibold uppercase tracking-wide border-2 border-green-200 shadow-sm hover:shadow-md transition-all">
                                        <i class="fa-solid fa-check-double mr-2 text-green-600"></i> Disetujui
                                    </span>
                                @elseif($report->status == 'rejected' || $report->status == 'ditolak')
                                    <span class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-red-50 to-rose-50 text-red-700 text-xs font-semibold uppercase tracking-wide border-2 border-red-200 shadow-sm hover:shadow-md transition-all">
                                        <i class="fa-solid fa-circle-xmark mr-2 text-red-600"></i> Ditolak
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-amber-50 to-orange-50 text-amber-700 text-xs font-semibold uppercase tracking-wide border-2 border-amber-200 shadow-sm hover:shadow-md transition-all">
                                        <i class="fa-solid fa-spinner fa-spin mr-2 text-amber-600"></i> Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-7 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('reports.edit', $report->id) }}" class="group/btn w-11 h-11 flex items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 shadow-md hover:shadow-lg hover:scale-110 active:scale-95" title="Edit">
                                        <i class="fa-solid fa-pen-to-square text-sm group-hover/btn:rotate-12 transition-transform"></i>
                                    </a>
                                    
                                    <button type="button" onclick="confirmDelete('{{ $report->id }}')" class="group/btn w-11 h-11 flex items-center justify-center rounded-xl bg-gradient-to-br from-rose-500 to-red-600 text-white hover:from-rose-600 hover:to-red-700 transition-all duration-300 shadow-md hover:shadow-lg hover:scale-110 active:scale-95" title="Hapus">
                                        <i class="fa-solid fa-trash-can text-sm group-hover/btn:scale-110 transition-transform"></i>
                                    </button>

                                    <form id="delete-form-{{ $report->id }}" action="{{ route('reports.destroy', $report->id) }}" method="POST" class="hidden">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <i class="fa-solid fa-folder-open text-slate-300 text-6xl mb-4"></i>
                                    <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide">Belum ada laporan</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-8 py-6 bg-gradient-to-r from-slate-50 to-slate-100/50 border-t-2 border-slate-200">
                {{ $reports->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2500,
                background: '#ffffff',
                customClass: { 
                    popup: 'rounded-3xl shadow-2xl',
                    title: 'font-bold',
                    htmlContainer: 'font-medium'
                }
            });
        @endif

        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Laporan?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                background: '#ffffff',
                customClass: { 
                    popup: 'rounded-3xl shadow-2xl',
                    title: 'font-bold',
                    htmlContainer: 'font-medium',
                    confirmButton: 'rounded-xl font-semibold',
                    cancelButton: 'rounded-xl font-semibold'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>

    <style>
        /* Font Import */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        /* Background floating particles */
        @keyframes float-1 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.2; }
            33% { transform: translate(30px, -30px) scale(1.2); opacity: 0.4; }
            66% { transform: translate(-20px, 20px) scale(0.8); opacity: 0.3; }
        }
        @keyframes float-2 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.25; }
            33% { transform: translate(-40px, 30px) scale(1.3); opacity: 0.5; }
            66% { transform: translate(25px, -25px) scale(0.9); opacity: 0.35; }
        }
        @keyframes float-3 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.2; }
            33% { transform: translate(35px, 25px) scale(1.1); opacity: 0.45; }
            66% { transform: translate(-30px, -20px) scale(0.85); opacity: 0.3; }
        }
        @keyframes float-4 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.25; }
            33% { transform: translate(-25px, -35px) scale(1.25); opacity: 0.5; }
            66% { transform: translate(30px, 15px) scale(0.9); opacity: 0.35; }
        }
        @keyframes float-5 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
            33% { transform: translate(20px, -25px) scale(1.15); opacity: 0.55; }
            66% { transform: translate(-35px, 30px) scale(0.95); opacity: 0.4; }
        }

        .animate-float-1 { animation: float-1 10s ease-in-out infinite; }
        .animate-float-2 { animation: float-2 12s ease-in-out infinite; }
        .animate-float-3 { animation: float-3 14s ease-in-out infinite; }
        .animate-float-4 { animation: float-4 11s ease-in-out infinite; }
        .animate-float-5 { animation: float-5 13s ease-in-out infinite; }

        /* Slide animations */
        @keyframes slide-down {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down { 
            animation: slide-down 0.8s cubic-bezier(0.16, 1, 0.3, 1); 
        }

        @keyframes slide-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up {
            opacity: 0;
            animation: slide-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Fade in animation for table rows */
        @keyframes fade-in {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-fade-in {
            opacity: 0;
            animation: fade-in 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</x-app-layout>