<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Animated background particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-indigo-400 rounded-full animate-float-1" style="top: 15%; left: 10%;"></div>
        <div class="absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2" style="top: 25%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-purple-400 rounded-full animate-float-3" style="top: 65%; left: 20%;"></div>
        <div class="absolute w-3 h-3 bg-indigo-300 rounded-full animate-float-4" style="top: 75%; left: 80%;"></div>
        <div class="absolute w-2 h-2 bg-blue-300 rounded-full animate-float-5" style="top: 45%; left: 75%;"></div>
    </div>

    <div class="min-h-screen bg-white py-8 px-4 sm:px-6 lg:px-12 relative z-10">
        <div class="max-w-[1600px] mx-auto">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 animate-slide-down">
                <div>
                    <h1 class="text-4xl font-bold text-slate-800 tracking-tight mb-2">
                        Statistik Aktivitas
                    </h1>
                    <p class="text-slate-600 font-medium">
                        Visualisasi progres magang Anda secara real-time
                    </p>
                </div>
                <div class="group">
                    <span class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-500 to-green-500 rounded-2xl text-xs font-semibold text-white shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:shadow-emerald-500/40 transition-all duration-300 hover:scale-105">
                        <span class="w-2 h-2 rounded-full bg-white mr-3 animate-pulse"></span>
                        Update: {{ now()->translatedFormat('d F Y') }}
                    </span>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                <!-- Total Jurnal -->
                <div class="group relative bg-gradient-to-br from-slate-700 to-slate-800 p-8 rounded-3xl shadow-xl shadow-slate-900/20 hover:shadow-2xl hover:shadow-slate-900/30 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.1s;">
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/5 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/5 to-white/0 group-hover:via-white/10 transition-all duration-700 animate-shimmer"></div>
                    
                    <div class="relative">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-4">Total Jurnal</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-5xl font-bold text-white tracking-tight">{{ $reports->count() }}</h3>
                            <span class="text-slate-400 text-sm font-medium">Entri</span>
                        </div>
                    </div>
                </div>

                <!-- Disetujui -->
                <div class="group relative bg-gradient-to-br from-emerald-500 to-green-600 p-8 rounded-3xl shadow-xl shadow-emerald-500/30 hover:shadow-2xl hover:shadow-emerald-500/40 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.2s;">
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/10 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/5 to-white/0 group-hover:via-white/10 transition-all duration-700 animate-shimmer"></div>
                    
                    <div class="relative">
                        <p class="text-xs font-semibold text-emerald-100 uppercase tracking-wider mb-4">Disetujui</p>
                        <div class="flex items-baseline gap-2 mb-4">
                            <h3 class="text-5xl font-bold text-white tracking-tight">{{ $reports->where('status', 'disetujui')->count() }}</h3>
                            <span class="text-emerald-100 text-sm font-medium">Valid</span>
                        </div>
                        @php $percent = $reports->count() > 0 ? ($reports->where('status', 'disetujui')->count() / $reports->count()) * 100 : 0; @endphp
                        <div class="w-full bg-white/20 rounded-full h-2 overflow-hidden backdrop-blur-sm">
                            <div class="bg-white h-full rounded-full transition-all duration-1000 shadow-lg" style="width: {{ $percent }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Pending -->
                <div class="group relative bg-gradient-to-br from-amber-500 to-orange-600 p-8 rounded-3xl shadow-xl shadow-amber-500/30 hover:shadow-2xl hover:shadow-amber-500/40 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.3s;">
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/10 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/5 to-white/0 group-hover:via-white/10 transition-all duration-700 animate-shimmer"></div>
                    
                    <div class="relative">
                        <p class="text-xs font-semibold text-amber-100 uppercase tracking-wider mb-4">Pending</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-5xl font-bold text-white tracking-tight">{{ $reports->where('status', 'pending')->count() }}</h3>
                            <span class="text-amber-100 text-sm font-medium">Proses</span>
                        </div>
                    </div>
                </div>

                <!-- Poin Aktivitas -->
                <div class="group relative bg-gradient-to-br from-indigo-600 via-purple-600 to-indigo-700 p-8 rounded-3xl shadow-xl shadow-indigo-500/40 hover:shadow-2xl hover:shadow-indigo-500/50 transition-all duration-500 hover:scale-105 overflow-hidden animate-slide-up" style="animation-delay: 0.4s;">
                    <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/10 rounded-full group-hover:scale-125 transition-transform duration-500"></div>
                    <div class="absolute -left-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/5 to-white/0 group-hover:via-white/10 transition-all duration-700 animate-shimmer"></div>
                    
                    <div class="relative">
                        <p class="text-xs font-semibold text-indigo-100 uppercase tracking-wider mb-4">Poin Aktivitas</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-5xl font-bold text-white tracking-tight">{{ $reports->count() * 10 }}</h3>
                            <span class="text-indigo-200 text-sm font-medium">XP</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart and Recent Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Line Chart -->
                <div class="lg:col-span-2 animate-slide-up" style="animation-delay: 0.5s;">
                    <div class="bg-white/80 backdrop-blur-sm p-10 rounded-3xl border border-slate-200/50 shadow-xl shadow-slate-200/50 h-full hover:shadow-2xl hover:shadow-slate-200/60 transition-all duration-500">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide">Tren Penginputan Jurnal</h3>
                            <span class="text-xs bg-indigo-100 text-indigo-700 px-4 py-2 rounded-xl font-semibold border border-indigo-200">7 Hari Terakhir</span>
                        </div>
                        <div class="relative w-full h-[350px]">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Journals -->
                <div class="lg:col-span-1 animate-slide-up" style="animation-delay: 0.6s;">
                    <div class="bg-gradient-to-br from-slate-700 to-slate-800 p-8 rounded-3xl shadow-xl shadow-slate-900/30 h-full flex flex-col border border-slate-600/30 hover:shadow-2xl hover:shadow-slate-900/40 transition-all duration-500">
                        <h3 class="font-bold text-white text-sm uppercase tracking-wide mb-8">Jurnal Terbaru</h3>
                        <div class="space-y-6 flex-grow">
                            @forelse($reports->take(4) as $r)
                            <div class="flex gap-4 group/item">
                                <div class="flex flex-col items-center">
                                    <div class="w-3 h-3 rounded-full {{ $r->status == 'disetujui' ? 'bg-emerald-400 shadow-lg shadow-emerald-400/50' : 'bg-amber-400 shadow-lg shadow-amber-400/50' }} group-hover/item:scale-125 transition-transform duration-300"></div>
                                    <div class="w-[2px] h-full bg-slate-600/50 my-2 group-last:hidden"></div>
                                </div>
                                <div class="pb-6 flex-1">
                                    <p class="text-xs font-semibold text-indigo-400 uppercase tracking-wide mb-2">
                                        {{ \Carbon\Carbon::parse($r->tanggal)->translatedFormat('d M Y') }}
                                    </p>
                                    <p class="text-sm font-medium text-slate-300 leading-relaxed group-hover/item:text-white transition-colors duration-300">
                                        {{ Str::limit($r->kegiatan, 60) }}
                                    </p>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-16">
                                <i class="fa-solid fa-folder-open text-slate-600 text-5xl mb-4"></i>
                                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Belum ada data</p>
                            </div>
                            @endforelse
                        </div>
                        <a href="{{ route('reports.index') }}" class="block w-full text-center py-4 mt-6 bg-white/10 hover:bg-white/20 text-white border border-white/20 hover:border-white/30 rounded-2xl text-xs font-semibold uppercase tracking-wide transition-all duration-300 backdrop-blur-sm hover:scale-105">
                            Lihat Semua Jurnal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('lineChart').getContext('2d');
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(99, 102, 241, 0.2)'); 
            gradient.addColorStop(1, 'rgba(99, 102, 241, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($days) !!},
                    datasets: [{
                        label: 'Laporan',
                        data: {!! json_encode($chartData) !!},
                        borderColor: '#6366f1',
                        borderWidth: 3,
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#6366f1',
                        pointBorderWidth: 3,
                        pointRadius: 6,
                        pointHoverRadius: 9,
                        pointHoverBackgroundColor: '#6366f1',
                        pointHoverBorderColor: '#ffffff',
                        pointHoverBorderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            titleFont: { size: 14, weight: '600', family: 'system-ui' },
                            bodyFont: { size: 13, weight: '500', family: 'system-ui' },
                            padding: 16,
                            cornerRadius: 12,
                            displayColors: false,
                            titleColor: '#fff',
                            bodyColor: '#cbd5e1'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { 
                                color: '#f1f5f9', 
                                drawBorder: false,
                                lineWidth: 1
                            },
                            ticks: { 
                                stepSize: 1,
                                color: '#64748b', 
                                font: { size: 11, weight: '600', family: 'system-ui' },
                                padding: 8
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { 
                                color: '#64748b', 
                                font: { size: 11, weight: '600', family: 'system-ui' },
                                padding: 8
                            }
                        }
                    }
                }
            });
        });
    </script>

    <style>
        /* Font Import */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

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

        .animate-float-1 { animation: float-1 8s ease-in-out infinite; }
        .animate-float-2 { animation: float-2 10s ease-in-out infinite; }
        .animate-float-3 { animation: float-3 12s ease-in-out infinite; }
        .animate-float-4 { animation: float-4 9s ease-in-out infinite; }
        .animate-float-5 { animation: float-5 11s ease-in-out infinite; }

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
</x-app-layout>