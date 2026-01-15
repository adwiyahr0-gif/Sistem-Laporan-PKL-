<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <div class="min-h-screen bg-[#F8FAFC] py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            @if(session('success'))
                <div class="mb-6 animate__animated animate__fadeInDown">
                    <div class="bg-emerald-500 text-white p-4 rounded-2xl font-bold shadow-lg shadow-emerald-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 animate__animated animate__shakeX">
                    <div class="bg-rose-500 text-white p-4 rounded-2xl font-bold shadow-lg shadow-rose-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif
            
            <div class="mb-8 animate__animated animate__fadeInDown">
                <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Presensi Magang</h2>
                <p class="text-slate-500 mt-1 font-medium">Catat kehadiran harian Anda dengan tepat waktu di Kominfo Binjai.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    <div class="bg-gradient-to-br from-indigo-600 to-violet-700 p-8 rounded-[3rem] shadow-xl shadow-indigo-200 text-white relative overflow-hidden animate__animated animate__fadeInLeft">
                        <div class="relative z-10 flex flex-col md:flex-row justify-between items-center">
                            <div>
                                <p class="text-indigo-100 font-bold uppercase tracking-widest text-xs">Waktu Saat Ini</p>
                                <h3 id="clock" class="text-5xl font-black mt-2">00:00:00</h3>
                                <p class="text-indigo-200 font-medium mt-1">{{ now()->translatedFormat('l, d F Y') }}</p>
                            </div>
                            <div class="mt-6 md:mt-0 text-center md:text-right">
                                <span class="px-4 py-2 bg-white/20 backdrop-blur-md rounded-2xl text-sm font-bold border border-white/30">
                                    📌 Lokasi: Kantor Kominfo
                                </span>
                            </div>
                        </div>
                        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 animate__animated animate__fadeInUp">
                        
                        <div class="bg-white p-8 rounded-[3rem] border border-white shadow-xl shadow-slate-200/50 flex flex-col items-center text-center transition-all hover:shadow-2xl">
                            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-black text-slate-800">Absen Masuk</h4>
                            <p class="text-slate-400 text-sm font-medium mt-1">Jam Kerja: 08:00 WIB</p>
                            
                            @if(!$presensiHariIni)
                                <form action="{{ route('presensi.store') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="type" value="masuk">
                                    <button type="submit" class="w-full mt-6 py-4 bg-emerald-500 hover:bg-emerald-600 text-white rounded-2xl font-bold shadow-lg shadow-emerald-200 transition-all active:scale-95">
                                        Check In Sekarang
                                    </button>
                                </form>
                            @else
                                <div class="w-full mt-6 py-4 bg-slate-50 border border-slate-100 text-emerald-600 rounded-2xl font-black">
                                    Sudah Masuk: {{ \Carbon\Carbon::parse($presensiHariIni->jam_masuk)->format('H:i') }}
                                </div>
                            @endif
                        </div>

                        <div class="bg-white p-8 rounded-[3rem] border border-white shadow-xl shadow-slate-200/50 flex flex-col items-center text-center transition-all">
                            <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-black text-slate-800">Absen Pulang</h4>
                            <p class="text-slate-400 text-sm font-medium mt-1">Jam Pulang: 17:00 WIB</p>
                            
                            @if($presensiHariIni && !$presensiHariIni->jam_pulang)
                                <form action="{{ route('presensi.store') }}" method="POST" class="w-full">
                                    @csrf
                                    <input type="hidden" name="type" value="pulang">
                                    <button type="submit" class="w-full mt-6 py-4 bg-amber-500 hover:bg-amber-600 text-white rounded-2xl font-bold shadow-lg shadow-amber-200 transition-all active:scale-95">
                                        Check Out Sekarang
                                    </button>
                                </form>
                            @elseif($presensiHariIni && $presensiHariIni->jam_pulang)
                                <div class="w-full mt-6 py-4 bg-slate-50 border border-slate-100 text-amber-600 rounded-2xl font-black">
                                    Sudah Pulang: {{ \Carbon\Carbon::parse($presensiHariIni->jam_pulang)->format('H:i') }}
                                </div>
                            @else
                                <button disabled class="w-full mt-6 py-4 bg-slate-100 text-slate-400 rounded-2xl font-bold cursor-not-allowed italic">
                                    Belum Tersedia
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-6 animate__animated animate__fadeInRight">
                    <div class="bg-white p-8 rounded-[3rem] border border-white shadow-xl shadow-slate-200/50">
                        <h3 class="font-black text-slate-800 text-sm uppercase tracking-widest mb-6">Ringkasan Bulan Ini</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                                <span class="text-slate-500 font-bold text-sm">Hadir</span>
                                <span class="text-indigo-600 font-black text-lg">{{ $ringkasan['hadir'] }} Hari</span>
                            </div>
                            <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                                <span class="text-slate-500 font-bold text-sm">Terlambat</span>
                                <span class="text-rose-500 font-black text-lg">{{ $ringkasan['terlambat'] }} Kali</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-[3rem] border border-white shadow-xl shadow-slate-200/50">
                        <h3 class="font-black text-slate-800 text-sm uppercase tracking-widest mb-6">Riwayat Terakhir</h3>
                        <div class="space-y-6">
                            @forelse($riwayat as $row)
                                <div class="flex justify-between items-center border-b border-slate-50 pb-4">
                                    <div>
                                        <p class="text-sm font-black text-slate-700">{{ \Carbon\Carbon::parse($row->tanggal)->translatedFormat('d M Y') }}</p>
                                        <p class="text-xs text-slate-400 font-bold italic">Masuk: {{ $row->jam_masuk ?? '--:--' }}</p>
                                    </div>
                                    <span class="px-3 py-1 {{ $row->status == 'Hadir' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600' }} text-[10px] font-black rounded-lg">
                                        {{ strtoupper($row->status) }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <p class="text-slate-400 text-sm italic">Belum ada data riwayat.</p>
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
            document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</x-app-layout>