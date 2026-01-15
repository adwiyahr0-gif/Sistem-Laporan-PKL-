<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <div class="min-h-screen bg-[#F8FAFC] py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 animate__animated animate__fadeInDown">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Statistik Aktivitas</h2>
                    <p class="text-slate-500 mt-1 font-medium">Visualisasi progres magang Anda di Kominfo Binjai secara real-time.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <span class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-2xl text-sm font-semibold text-slate-600 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2"></span>
                        Update Terakhir: {{ now()->translatedFormat('d F Y') }}
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate__animated animate__fadeInUp">
                <div class="bg-white p-6 rounded-[2.5rem] border border-white shadow-xl shadow-slate-200/50 relative overflow-hidden group transition-all hover:-translate-y-1">
                    <p class="text-slate-400 text-xs font-black uppercase tracking-widest">Total Jurnal</p>
                    <div class="flex items-baseline gap-2 mt-2">
                        <h3 class="text-4xl font-black text-slate-800">{{ $reports->count() }}</h3>
                        <span class="text-slate-400 text-xs font-bold uppercase">Entri</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2.5rem] border border-white shadow-xl shadow-slate-200/50 transition-all hover:-translate-y-1">
                    <p class="text-slate-400 text-xs font-black uppercase tracking-widest text-emerald-600">Disetujui</p>
                    <div class="flex items-baseline gap-2 mt-2">
                        <h3 class="text-4xl font-black text-emerald-500">{{ $reports->where('status', 'disetujui')->count() }}</h3>
                        <span class="text-slate-400 text-xs font-bold uppercase">Valid</span>
                    </div>
                    @php $percent = $reports->count() > 0 ? ($reports->where('status', 'disetujui')->count() / $reports->count()) * 100 : 0; @endphp
                    <div class="mt-4 w-full bg-slate-100 rounded-full h-1.5">
                        <div class="bg-emerald-500 h-1.5 rounded-full transition-all duration-1000" style="width: {{ $percent }}%"></div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2.5rem] border border-white shadow-xl shadow-slate-200/50 transition-all hover:-translate-y-1">
                    <p class="text-slate-400 text-xs font-black uppercase tracking-widest text-amber-600">Pending</p>
                    <div class="flex items-baseline gap-2 mt-2">
                        <h3 class="text-4xl font-black text-amber-500">{{ $reports->where('status', 'pending')->count() }}</h3>
                        <span class="text-slate-400 text-xs font-bold uppercase">Proses</span>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-indigo-600 to-violet-700 p-6 rounded-[2.5rem] shadow-xl shadow-indigo-200 transition-all hover:-translate-y-1">
                    <p class="text-indigo-100 text-xs font-black uppercase tracking-widest">Poin Aktivitas</p>
                    <div class="flex items-baseline gap-2 mt-2 text-white">
                        <h3 class="text-4xl font-black">{{ $reports->count() * 10 }}</h3>
                        <span class="text-indigo-200 text-xs font-bold uppercase">XP</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 animate__animated animate__fadeInLeft">
                    <div class="bg-white p-8 rounded-[3rem] border border-white shadow-xl shadow-slate-200/50 h-full">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-black text-slate-800 text-sm uppercase tracking-widest">Tren Penginputan Jurnal</h3>
                            <span class="text-[10px] bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full font-bold">7 HARI TERAKHIR</span>
                        </div>
                        <div class="relative w-full h-[320px]">
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 animate__animated animate__fadeInRight">
                    <div class="bg-white p-8 rounded-[3rem] border border-white shadow-xl shadow-slate-200/50 h-full">
                        <h3 class="font-black text-slate-800 text-sm uppercase tracking-widest mb-8">Jurnal Terbaru</h3>
                        <div class="space-y-6">
                            @forelse($reports->take(4) as $r)
                            <div class="flex gap-4 group">
                                <div class="flex flex-col items-center">
                                    <div class="w-3 h-3 rounded-full {{ $r->status == 'disetujui' ? 'bg-emerald-500' : 'bg-amber-400' }} shadow-[0_0_8px_rgba(0,0,0,0.1)]"></div>
                                    <div class="w-0.5 h-full bg-slate-100 my-1 group-last:hidden"></div>
                                </div>
                                <div class="pb-6">
                                    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-tighter">
                                        {{ \Carbon\Carbon::parse($r->tanggal)->translatedFormat('d M Y') }}
                                    </p>
                                    <p class="text-sm font-bold text-slate-700 leading-tight mt-1 line-clamp-2 italic">
                                        "{{ $r->kegiatan }}"
                                    </p>
                                </div>
                            </div>
                            @empty
                            <div class="text-center py-10 text-slate-400">
                                <p class="text-sm italic">Belum ada data aktivitas.</p>
                            </div>
                            @endforelse
                        </div>
                        <a href="{{ route('reports.index') }}" class="block w-full text-center py-4 mt-4 bg-slate-50 rounded-2xl text-xs font-black text-slate-500 uppercase tracking-widest hover:bg-indigo-600 hover:text-white transition-all duration-300">
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
            
            // Efek Gradient Halus (Professional Grade)
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(79, 70, 229, 0.12)'); 
            gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($days) !!},
                    datasets: [{
                        label: 'Laporan',
                        data: {!! json_encode($chartData) !!},
                        borderColor: '#4f46e5', // Indigo 600
                        borderWidth: 3,
                        backgroundColor: gradient,
                        fill: true,
                        tension: 0.35, // Kurva elegan (tidak terlalu kaku, tidak terlalu melengkung)
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#4f46e5',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 7,
                        pointHoverBackgroundColor: '#4f46e5',
                        pointHoverBorderColor: '#ffffff',
                        pointHoverBorderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            padding: 12,
                            titleFont: { size: 12, weight: 'bold' },
                            bodyFont: { size: 12 },
                            cornerRadius: 8,
                            displayColors: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 3,
                            grid: {
                                color: '#f1f5f9',
                                drawBorder: false
                            },
                            ticks: {
                                stepSize: 1,
                                color: '#94a3b8',
                                font: { size: 11, weight: '600' },
                                padding: 8
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                color: '#94a3b8',
                                font: { size: 11, weight: '600' },
                                padding: 8
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>