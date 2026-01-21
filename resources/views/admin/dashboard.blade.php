<x-admin-layout>
    <!-- Animated background particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-indigo-400 rounded-full animate-float-1" style="top: 10%; left: 10%;"></div>
        <div class="absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2" style="top: 20%; left: 80%;"></div>
        <div class="absolute w-2 h-2 bg-purple-400 rounded-full animate-float-3" style="top: 60%; left: 15%;"></div>
        <div class="absolute w-3 h-3 bg-indigo-300 rounded-full animate-float-4" style="top: 80%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-blue-300 rounded-full animate-float-5" style="top: 40%; left: 70%;"></div>
        <div class="absolute w-4 h-4 bg-purple-300 rounded-full animate-float-6" style="top: 70%; left: 30%;"></div>
    </div>

    <div class="space-y-8 relative z-10">
        <!-- Header Section -->
        <div class="bg-gradient-to-br from-white to-indigo-50 rounded-3xl p-8 shadow-xl shadow-indigo-100/50 border border-indigo-500/20 relative overflow-hidden group hover:shadow-2xl hover:shadow-indigo-200/50 transition-all duration-500 animate-slide-down">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/0 via-purple-500/0 to-blue-500/0 group-hover:from-indigo-500/5 group-hover:via-purple-500/5 group-hover:to-blue-500/5 transition-all duration-700 animate-shimmer"></div>
            <div class="relative z-10">
                <h1 class="text-3xl font-black tracking-tight uppercase mb-2">
                    <span class="text-slate-800">RINGKASAN</span> 
                    <span class="bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500 bg-clip-text text-transparent animate-gradient-flow">STATISTIK</span>
                </h1>
                <p class="text-slate-500 text-sm">Selamat datang kembali di panel monitoring, <span class="text-indigo-600 font-bold">{{ auth()->user()->name }}</span>.</p>
            </div>
            <div class="absolute right-0 top-0 opacity-5 translate-x-1/4 -translate-y-1/4 group-hover:opacity-10 group-hover:scale-110 transition-all duration-500">
                <i class="fa-solid fa-chart-pie text-[180px] text-indigo-500"></i>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Mahasiswa -->
            <div class="group relative bg-gradient-to-br from-white to-slate-50 p-6 rounded-3xl border border-indigo-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-indigo-500/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.1s;">
                <div class="absolute -right-6 -top-6 w-32 h-32 bg-gradient-to-br from-indigo-100 to-blue-100 rounded-full group-hover:scale-125 transition-transform duration-500 opacity-50"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/0 via-blue-500/0 to-purple-500/0 group-hover:from-indigo-500/5 group-hover:via-blue-500/5 group-hover:to-purple-500/5 transition-all duration-700 animate-shimmer"></div>
                
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-[11px] font-black text-slate-400 uppercase tracking-[0.2em]">Total Mahasiswa</p>
                        <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                            <i class="fa-solid fa-user-graduate text-indigo-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-end gap-3">
                        <span class="text-5xl font-black bg-gradient-to-r from-indigo-600 to-blue-600 bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">{{ $totalMahasiswa }}</span>
                        <div class="mb-2.5">
                            <span class="inline-flex items-center gap-1 text-xs font-bold text-green-600 bg-green-50 px-2 py-1 rounded-full">
                                <i class="fa-solid fa-arrow-up text-[10px]"></i>
                                Aktif
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="absolute top-3 right-3 w-2 h-2 bg-indigo-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
            </div>

            <!-- Laporan Masuk -->
            <div class="group relative bg-gradient-to-br from-white to-blue-50/30 p-6 rounded-3xl border border-blue-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.2s;">
                <div class="absolute -right-6 -top-6 w-32 h-32 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-full group-hover:scale-125 transition-transform duration-500 opacity-50"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500/0 via-cyan-500/0 to-indigo-500/0 group-hover:from-blue-500/5 group-hover:via-cyan-500/5 group-hover:to-indigo-500/5 transition-all duration-700 animate-shimmer"></div>
                
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-[11px] font-black text-blue-600 uppercase tracking-[0.2em]">Laporan Masuk</p>
                        <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                            <i class="fa-solid fa-file-invoice text-blue-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-end gap-3">
                        <span class="text-5xl font-black text-blue-600 group-hover:scale-110 transition-transform duration-300">{{ $totalLaporan }}</span>
                        <div class="mb-2.5">
                            <span class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                                <i class="fa-solid fa-clock text-[10px]"></i>
                                {{ $laporanPending }} Validasi
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="absolute top-3 right-3 w-2 h-2 bg-blue-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
            </div>

            <!-- Presensi -->
            <div class="group relative bg-gradient-to-br from-white to-green-50/30 p-6 rounded-3xl border border-green-500/20 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-green-500/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.3s;">
                <div class="absolute -right-6 -top-6 w-32 h-32 bg-gradient-to-br from-green-100 to-emerald-100 rounded-full group-hover:scale-125 transition-transform duration-500 opacity-50"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-green-500/0 via-emerald-500/0 to-teal-500/0 group-hover:from-green-500/5 group-hover:via-emerald-500/5 group-hover:to-teal-500/5 transition-all duration-700 animate-shimmer"></div>
                
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-[11px] font-black text-green-600 uppercase tracking-[0.2em]">Presensi</p>
                        <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                            <i class="fa-solid fa-calendar-check text-green-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-end gap-3">
                        <span class="text-5xl font-black text-green-600 group-hover:scale-110 transition-transform duration-300">{{ $totalLaporan }}</span>
                        <div class="mb-2.5">
                            <span class="inline-flex items-center gap-1 text-xs font-bold text-green-600">
                                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                Jurnal Terdata
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="absolute top-3 right-3 w-2 h-2 bg-green-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
            </div>
        </div>

        <!-- Chart Statistics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Status Laporan Chart -->
            <div class="bg-gradient-to-br from-white to-indigo-50 rounded-3xl border border-indigo-500/20 shadow-xl shadow-slate-200/50 p-6 md:p-8 overflow-hidden group hover:shadow-2xl hover:shadow-indigo-200/50 transition-all duration-500 animate-slide-up" style="animation-delay: 0.5s;">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Status Laporan</h3>
                        <p class="text-sm text-slate-500 mt-1">Distribusi status validasi jurnal</p>
                    </div>
                    <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                        <i class="fa-solid fa-chart-pie text-indigo-500 text-xl"></i>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <!-- Approved -->
                    <div class="group/item">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-sm font-bold text-slate-700">Approved</span>
                            </div>
                            <span class="text-sm font-black text-green-600">{{ $laporanApproved ?? 0 }}</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-3 rounded-full transition-all duration-1000 group-hover/item:scale-x-105" style="width: {{ $totalLaporan > 0 ? ($laporanApproved / $totalLaporan * 100) : 0 }}%"></div>
                        </div>
                    </div>

                    <!-- Pending -->
                    <div class="group/item">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-amber-500 rounded-full"></div>
                                <span class="text-sm font-bold text-slate-700">Pending</span>
                            </div>
                            <span class="text-sm font-black text-amber-600">{{ $laporanPending ?? 0 }}</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-amber-500 to-yellow-500 h-3 rounded-full transition-all duration-1000 group-hover/item:scale-x-105" style="width: {{ $totalLaporan > 0 ? ($laporanPending / $totalLaporan * 100) : 0 }}%"></div>
                        </div>
                    </div>

                    <!-- Rejected -->
                    <div class="group/item">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-rose-500 rounded-full"></div>
                                <span class="text-sm font-bold text-slate-700">Rejected</span>
                            </div>
                            <span class="text-sm font-black text-rose-600">{{ $laporanRejected ?? 0 }}</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-3 overflow-hidden">
                            <div class="bg-gradient-to-r from-rose-500 to-red-500 h-3 rounded-full transition-all duration-1000 group-hover/item:scale-x-105" style="width: {{ $totalLaporan > 0 ? ($laporanRejected / $totalLaporan * 100) : 0 }}%"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 p-4 bg-indigo-50 rounded-2xl">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Total Laporan</span>
                        <span class="text-2xl font-black text-indigo-600">{{ $totalLaporan }}</span>
                    </div>
                </div>
            </div>

            <!-- Activity Chart -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-3xl border border-blue-500/20 shadow-xl shadow-slate-200/50 p-6 md:p-8 overflow-hidden group hover:shadow-2xl hover:shadow-blue-200/50 transition-all duration-500 animate-slide-up" style="animation-delay: 0.6s;">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Aktivitas Mahasiswa</h3>
                        <p class="text-sm text-slate-500 mt-1">Statistik kehadiran & laporan</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center group-hover:scale-110 group-hover:rotate-12 transition-all duration-300">
                        <i class="fa-solid fa-chart-bar text-blue-500 text-xl"></i>
                    </div>
                </div>

                <div class="space-y-6">
                    <!-- Active Students -->
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                            <i class="fa-solid fa-users text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-black text-slate-400 uppercase tracking-wider mb-1">Mahasiswa Aktif</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-3xl font-black text-blue-600">{{ $totalMahasiswa }}</span>
                                <span class="text-xs text-slate-500">peserta</span>
                            </div>
                        </div>
                    </div>

                    <!-- Average Reports -->
                    <div class="flex items-center gap-4">
                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-500/30">
                            <i class="fa-solid fa-file-lines text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-xs font-black text-slate-400 uppercase tracking-wider mb-1">Rata-rata Laporan</p>
                            <div class="flex items-baseline gap-2">
                                <span class="text-3xl font-black text-purple-600">{{ $totalMahasiswa > 0 ? number_format($totalLaporan / $totalMahasiswa, 1) : 0 }}</span>
                                <span class="text-xs text-slate-500">per mahasiswa</span>
                            </div>
                        </div>
                    </div>

                    <!-- Completion Rate -->
                    <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl border border-green-200">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-green-700 uppercase tracking-wider">Tingkat Validasi</span>
                            <span class="text-lg font-black text-green-600">{{ $totalLaporan > 0 ? number_format(($laporanApproved / $totalLaporan * 100), 1) : 0 }}%</span>
                        </div>
                        <div class="w-full bg-white rounded-full h-2 overflow-hidden">
                            <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-2 rounded-full transition-all duration-1000" style="width: {{ $totalLaporan > 0 ? ($laporanApproved / $totalLaporan * 100) : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reports Table -->
        <div class="bg-gradient-to-br from-white to-slate-50 rounded-3xl border border-indigo-500/20 shadow-xl shadow-slate-200/50 overflow-hidden animate-slide-up" style="animation-delay: 0.7s;">
            <div class="p-6 md:p-8 border-b border-slate-200 bg-gradient-to-r from-indigo-50/50 to-transparent">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Laporan Jurnal Terbaru</h2>
                        <p class="text-sm text-slate-500 mt-1">Memerlukan peninjauan dan validasi pembimbing</p>
                    </div>
                    <a href="{{ route('admin.jurnal.index') }}" class="group/btn relative px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-xl hover:shadow-indigo-500/50 transition-all duration-300 hover:scale-105 overflow-hidden">
                        <span class="relative z-10 flex items-center gap-2">
                            <i class="fa-solid fa-eye"></i>
                            Lihat Semua
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-200%] group-hover/btn:translate-x-[200%] transition-transform duration-700"></div>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-slate-100 to-indigo-50">
                        <tr>
                            <th class="px-6 md:px-8 py-4 text-left text-xs font-black text-slate-600 uppercase tracking-wider">No</th>
                            <th class="px-6 md:px-8 py-4 text-left text-xs font-black text-slate-600 uppercase tracking-wider">Mahasiswa</th>
                            <th class="px-6 md:px-8 py-4 text-left text-xs font-black text-slate-600 uppercase tracking-wider">Kegiatan</th>
                            <th class="px-6 md:px-8 py-4 text-left text-xs font-black text-slate-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 md:px-8 py-4 text-center text-xs font-black text-slate-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentReports as $report)
                        <tr class="group/row hover:bg-indigo-50/50 transition-all duration-300">
                            <td class="px-6 md:px-8 py-5 whitespace-nowrap">
                                <span class="text-sm font-bold text-slate-500">{{ $loop->iteration }}</span>
                            </td>
                            <td class="px-6 md:px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center text-white font-black text-sm shadow-lg group-hover/row:scale-110 transition-transform duration-300">
                                        {{ substr($report->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">{{ $report->user->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $report->user->universitas ?? 'Tanpa Instansi' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 md:px-8 py-5">
                                <p class="text-sm text-slate-700 max-w-xs truncate">{{ $report->kegiatan }}</p>
                            </td>
                            <td class="px-6 md:px-8 py-5">
                                @if($report->status == 'pending')
                                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded-full">
                                        <span class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                                        PENDING
                                    </span>
                                @elseif($report->status == 'approved' || $report->status == 'disetujui')
                                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">
                                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                        APPROVED
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 px-3 py-1 bg-rose-100 text-rose-700 text-xs font-bold rounded-full">
                                        <span class="w-2 h-2 bg-rose-500 rounded-full animate-pulse"></span>
                                        REJECTED
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 md:px-8 py-5 text-center">
                                <a href="{{ route('admin.jurnal.index') }}" class="group/action relative inline-flex w-9 h-9 bg-indigo-500 hover:bg-indigo-600 text-white rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-xl hover:shadow-indigo-500/50 transition-all duration-300 hover:scale-110 overflow-hidden items-center justify-center" title="Lihat Detail">
                                    <i class="fa-solid fa-eye relative z-10"></i>
                                    <div class="absolute inset-0 bg-white/20 translate-x-[-100%] group-hover/action:translate-x-[100%] transition-transform duration-500"></div>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                                        <i class="fa-solid fa-inbox text-slate-400 text-3xl"></i>
                                    </div>
                                    <p class="text-slate-400 text-sm font-bold">Belum ada laporan masuk</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        /* Background floating particles */
        @keyframes float-1 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
            33% { transform: translate(30px, -30px) scale(1.2); opacity: 0.6; }
            66% { transform: translate(-20px, 20px) scale(0.8); opacity: 0.4; }
        }
        @keyframes float-2 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.4; }
            33% { transform: translate(-40px, 30px) scale(1.3); opacity: 0.7; }
            66% { transform: translate(25px, -25px) scale(0.9); opacity: 0.5; }
        }
        @keyframes float-3 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
            33% { transform: translate(35px, 25px) scale(1.1); opacity: 0.6; }
            66% { transform: translate(-30px, -20px) scale(0.85); opacity: 0.4; }
        }
        @keyframes float-4 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.35; }
            33% { transform: translate(-25px, -35px) scale(1.25); opacity: 0.65; }
            66% { transform: translate(30px, 15px) scale(0.9); opacity: 0.45; }
        }
        @keyframes float-5 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.4; }
            33% { transform: translate(20px, -25px) scale(1.15); opacity: 0.7; }
            66% { transform: translate(-35px, 30px) scale(0.95); opacity: 0.5; }
        }
        @keyframes float-6 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.3; }
            33% { transform: translate(-30px, 20px) scale(1.2); opacity: 0.6; }
            66% { transform: translate(25px, -30px) scale(0.85); opacity: 0.4; }
        }

        .animate-float-1 { animation: float-1 8s ease-in-out infinite; }
        .animate-float-2 { animation: float-2 10s ease-in-out infinite; }
        .animate-float-3 { animation: float-3 12s ease-in-out infinite; }
        .animate-float-4 { animation: float-4 9s ease-in-out infinite; }
        .animate-float-5 { animation: float-5 11s ease-in-out infinite; }
        .animate-float-6 { animation: float-6 13s ease-in-out infinite; }

        /* Slide animations */
        @keyframes slide-down {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-down { animation: slide-down 0.6s ease-out; }

        @keyframes slide-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up {
            opacity: 0;
            animation: slide-up 0.6s ease-out forwards;
        }

        /* Gradient flow */
        @keyframes gradient-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient-flow {
            background-size: 200% 200%;
            animation: gradient-flow 4s ease infinite;
        }

        /* Shimmer effect */
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        .animate-shimmer {
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }
    </style>
</x-admin-layout>