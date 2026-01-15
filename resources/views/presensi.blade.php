<x-app-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Presensi Magang</h2>
        <p class="text-slate-500 text-sm">Catat kehadiran harian Anda di Kominfo Binjai.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col items-center">
            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center mb-4">
                <i class="fa-solid fa-right-to-bracket text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800">Absen Masuk</h3>
            <p class="text-slate-400 text-xs mb-6">Jam Kerja: 08:00 WIB</p>
            <button class="w-full py-3 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl font-bold transition-all shadow-lg shadow-emerald-200">
                Check In Sekarang
            </button>
        </div>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col items-center">
            <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mb-4">
                <i class="fa-solid fa-right-from-bracket text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800">Absen Pulang</h3>
            <p class="text-slate-400 text-xs mb-6">Jam Pulang: 17:00 WIB</p>
            <button class="w-full py-3 bg-slate-100 text-slate-400 rounded-xl font-bold cursor-not-allowed" disabled>
                Check Out Belum Tersedia
            </button>
        </div>
    </div>
</x-app-layout>