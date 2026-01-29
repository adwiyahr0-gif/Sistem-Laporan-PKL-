<x-app-layout>
    <!-- Animated background particles -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute w-2 h-2 bg-indigo-300 rounded-full animate-float-1" style="top: 10%; left: 8%;"></div>
        <div class="absolute w-3 h-3 bg-emerald-300 rounded-full animate-float-2" style="top: 20%; left: 85%;"></div>
        <div class="absolute w-2 h-2 bg-amber-300 rounded-full animate-float-3" style="top: 60%; left: 12%;"></div>
        <div class="absolute w-3 h-3 bg-indigo-200 rounded-full animate-float-4" style="top: 75%; left: 88%;"></div>
        <div class="absolute w-2 h-2 bg-emerald-200 rounded-full animate-float-5" style="top: 45%; left: 78%;"></div>
    </div>

    <div class="min-h-screen bg-white py-8 px-4 sm:px-6 lg:px-12 relative z-10">
        <div class="max-w-[1600px] mx-auto">
            
            @if(session('success'))
                <div class="mb-8 animate-slide-down">
                    <div class="bg-gradient-to-r from-emerald-50 to-green-50 text-emerald-700 border-2 border-emerald-200 p-5 rounded-2xl font-semibold flex items-center shadow-lg shadow-emerald-100/50">
                        <i class="fa-solid fa-circle-check mr-3 text-xl text-emerald-600"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="mb-12 animate-slide-down">
                <h1 class="text-4xl font-bold text-slate-800 tracking-tight mb-2">Presensi Magang</h1>
                <p class="text-slate-600 font-medium">Catat kehadiran harian Anda dengan tepat waktu di Kominfo Binjai</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Clock Card -->
                    <div class="group relative bg-gradient-to-br from-indigo-600 via-purple-600 to-indigo-700 p-12 rounded-3xl shadow-2xl shadow-indigo-500/40 text-white overflow-hidden animate-slide-up hover:shadow-3xl hover:shadow-indigo-500/50 transition-all duration-500" style="animation-delay: 0.1s;">
                        <div class="relative z-10">
                            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                                <div class="text-center md:text-left">
                                    <p class="text-indigo-200 font-semibold uppercase tracking-wide text-xs mb-2">Waktu Saat Ini</p>
                                    <h3 id="clock" class="text-6xl md:text-7xl font-bold mt-2 tracking-tight group-hover:scale-105 transition-transform duration-300">00:00:00</h3>
                                    <p class="text-indigo-200 font-medium mt-3 text-sm tracking-wide">{{ now()->translatedFormat('l, d F Y') }}</p>
                                </div>
                                <div>
                                    <span class="inline-flex items-center px-6 py-3 bg-white/10 backdrop-blur-lg rounded-2xl text-xs font-semibold border-2 border-white/20 uppercase tracking-wide hover:bg-white/20 transition-all">
                                        <i class="fa-solid fa-location-dot mr-2 text-rose-400"></i> Kantor Kominfo Binjai
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute -left-10 -top-10 w-48 h-48 bg-indigo-400/20 rounded-full blur-2xl group-hover:scale-110 transition-transform duration-700"></div>
                    </div>

                    <!-- Check In/Out Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <!-- Check In -->
                        <div class="group bg-white p-8 rounded-3xl border-2 border-slate-100 shadow-lg hover:shadow-xl hover:border-emerald-200 transition-all duration-500 flex flex-col items-center text-center animate-slide-up hover:scale-105" style="animation-delay: 0.2s;">
                            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-green-600 text-white rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-lg shadow-emerald-500/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i class="fa-solid fa-right-to-bracket"></i>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 uppercase tracking-tight mb-1">Absen Masuk</h4>
                            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wide mb-6">Jadwal: 08:00 WIB</p>
                            
                            @if(!$presensiHariIni)
                                <form action="{{ route('presensi.store') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="type" value="masuk">
                                    <button type="submit" class="group/btn w-full py-4 bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white rounded-2xl font-semibold uppercase text-sm tracking-wide shadow-lg shadow-emerald-500/30 hover:shadow-xl hover:shadow-emerald-500/40 transition-all transform hover:scale-105 active:scale-95">
                                        <i class="fa-solid fa-fingerprint mr-2 group-hover/btn:scale-110 transition-transform inline-block"></i>
                                        Check In Sekarang
                                    </button>
                                </form>
                            @else
                                <div class="w-full py-4 bg-gradient-to-r from-emerald-50 to-green-50 border-2 border-emerald-200 text-emerald-700 rounded-2xl font-semibold text-sm uppercase tracking-wide shadow-sm">
                                    <i class="fa-solid fa-clock mr-2"></i> {{ \Carbon\Carbon::parse($presensiHariIni->jam_masuk)->format('H:i') }} WIB
                                </div>
                            @endif
                        </div>

                        <!-- Check Out -->
                        <div class="group bg-white p-8 rounded-3xl border-2 border-slate-100 shadow-lg hover:shadow-xl hover:border-amber-200 transition-all duration-500 flex flex-col items-center text-center animate-slide-up hover:scale-105" style="animation-delay: 0.3s;">
                            <div class="w-20 h-20 bg-gradient-to-br from-amber-500 to-orange-600 text-white rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-lg shadow-amber-500/30 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </div>
                            <h4 class="text-lg font-bold text-slate-800 uppercase tracking-tight mb-1">Absen Pulang</h4>
                            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wide mb-6">Jadwal: 17:00 WIB</p>
                            
                            @if($presensiHariIni && !$presensiHariIni->jam_pulang)
                                <form action="{{ route('presensi.store') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="type" value="pulang">
                                    <button type="submit" class="group/btn w-full py-4 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white rounded-2xl font-semibold uppercase text-sm tracking-wide shadow-lg shadow-amber-500/30 hover:shadow-xl hover:shadow-amber-500/40 transition-all transform hover:scale-105 active:scale-95">
                                        <i class="fa-solid fa-fingerprint mr-2 group-hover/btn:scale-110 transition-transform inline-block"></i>
                                        Check Out Sekarang
                                    </button>
                                </form>
                            @elseif($presensiHariIni && $presensiHariIni->jam_pulang)
                                <div class="w-full py-4 bg-gradient-to-r from-amber-50 to-orange-50 border-2 border-amber-200 text-amber-700 rounded-2xl font-semibold text-sm uppercase tracking-wide shadow-sm">
                                    <i class="fa-solid fa-clock mr-2"></i> {{ \Carbon\Carbon::parse($presensiHariIni->jam_pulang)->format('H:i') }} WIB
                                </div>
                            @else
                                <button disabled class="w-full py-4 bg-slate-100 text-slate-400 rounded-2xl font-semibold text-sm uppercase tracking-wide cursor-not-allowed border-2 border-slate-200">
                                    <i class="fa-solid fa-lock mr-2"></i> Belum Tersedia
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Summary Card -->
                    <div class="bg-white p-8 rounded-3xl border-2 border-slate-100 shadow-lg hover:shadow-xl transition-all duration-500 animate-slide-up" style="animation-delay: 0.4s;">
                        <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white mr-3 shadow-md">
                                <i class="fa-solid fa-chart-simple text-sm"></i>
                            </div>
                            Ringkasan Bulan Ini
                        </h3>
                        <div class="space-y-4">
                            <div class="group flex justify-between items-center p-5 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl border-2 border-indigo-100 hover:border-indigo-200 transition-all hover:scale-105">
                                <span class="text-slate-700 font-semibold text-sm uppercase tracking-wide">Hadir</span>
                                <span class="text-indigo-600 font-bold text-2xl group-hover:scale-110 transition-transform">{{ $ringkasan['hadir'] }}</span>
                            </div>
                            <div class="group flex justify-between items-center p-5 bg-gradient-to-r from-rose-50 to-red-50 rounded-2xl border-2 border-rose-100 hover:border-rose-200 transition-all hover:scale-105">
                                <span class="text-rose-700 font-semibold text-sm uppercase tracking-wide">Terlambat</span>
                                <span class="text-rose-600 font-bold text-2xl group-hover:scale-110 transition-transform">{{ $ringkasan['terlambat'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- History Card -->
                    <div class="bg-white p-8 rounded-3xl border-2 border-slate-100 shadow-lg hover:shadow-xl transition-all duration-500 animate-slide-up" style="animation-delay: 0.5s;">
                        <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wide mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-green-600 rounded-xl flex items-center justify-center text-white mr-3 shadow-md">
                                <i class="fa-solid fa-history text-sm"></i>
                            </div>
                            Riwayat Terakhir
                        </h3>
                        <div class="space-y-6">
                            @forelse($riwayat as $index => $row)
                                <div class="flex justify-between items-center border-b-2 border-slate-50 pb-5 last:border-0 last:pb-0 group hover:bg-slate-50 px-3 py-2 rounded-xl -mx-3 -my-2 transition-all animate-fade-in" style="animation-delay: {{ 0.6 + ($index * 0.1) }}s;">
                                    <div>
                                        <p class="text-sm font-bold text-slate-800 tracking-tight">{{ \Carbon\Carbon::parse($row->tanggal)->translatedFormat('d M Y') }}</p>
                                        <p class="text-xs text-slate-500 font-medium mt-1">
                                            <i class="fa-solid fa-clock text-indigo-500 mr-1"></i>
                                            {{ $row->jam_masuk ?? '--:--' }}
                                        </p>
                                    </div>
                                    <span class="px-3 py-1.5 {{ $row->status == 'Hadir' ? 'bg-gradient-to-r from-emerald-50 to-green-50 text-emerald-700 border-emerald-200' : 'bg-gradient-to-r from-rose-50 to-red-50 text-rose-700 border-rose-200' }} text-xs font-semibold rounded-xl border-2 uppercase tracking-wide group-hover:scale-110 transition-transform">
                                        {{ $row->status }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-center py-10">
                                    <i class="fa-solid fa-inbox text-slate-200 text-4xl mb-3"></i>
                                    <p class="text-slate-400 text-sm font-semibold uppercase tracking-wide">Belum ada data</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const clockElement = document.getElementById('clock');
            if(clockElement) {
                clockElement.textContent = `${hours}:${minutes}:${seconds}`;
            }
        }
        setInterval(updateClock, 1000);
        updateClock();
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

        /* Fade in animation */
        @keyframes fade-in {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        .animate-fade-in {
            opacity: 0;
            animation: fade-in 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</x-app-layout>