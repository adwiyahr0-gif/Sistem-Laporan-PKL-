<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 border-t-4 border-indigo-900">
                
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 tracking-tight text-uppercase">HALO, {{ strtoupper(Auth::user()->name) }}! 👋</h3>
                    <p class="text-gray-500 mt-1">Berikut adalah ringkasan progres kegiatan magang Anda di Kominfo Binjai.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100 shadow-sm transition hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="p-3 bg-indigo-600 rounded-lg text-white mr-4 shadow-lg">
                                <i class="fa-solid fa-file-lines text-lg"></i>
                            </div>
                            <div>
                                <p class="text-indigo-600 font-bold uppercase text-[10px] tracking-widest leading-none">Total Laporan</p>
                                <h4 class="text-4xl font-black text-indigo-900 mt-1">{{ $data['total'] }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="bg-green-50 p-6 rounded-xl border border-green-100 shadow-sm transition hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="p-3 bg-green-600 rounded-lg text-white mr-4 shadow-lg">
                                <i class="fa-solid fa-check-double text-lg"></i>
                            </div>
                            <div>
                                <p class="text-green-600 font-bold uppercase text-[10px] tracking-widest leading-none">Disetujui</p>
                                <h4 class="text-4xl font-black text-green-900 mt-1">{{ $data['disetujui'] }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="bg-amber-50 p-6 rounded-xl border border-amber-100 shadow-sm transition hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="p-3 bg-amber-500 rounded-lg text-white mr-4 shadow-lg">
                                <i class="fa-solid fa-clock-rotate-left text-lg"></i>
                            </div>
                            <div>
                                <p class="text-amber-600 font-bold uppercase text-[10px] tracking-widest leading-none">Menunggu Review</p>
                                <h4 class="text-4xl font-black text-amber-900 mt-1">{{ $data['pending'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <a href="{{ route('reports.index') }}" class="flex-1 flex items-center justify-center p-4 bg-indigo-900 text-white rounded-lg hover:bg-indigo-800 transition font-bold uppercase text-xs tracking-widest shadow-xl">
                        <i class="fa-solid fa-list-check mr-2"></i> LIHAT SEMUA LAPORAN
                    </a>
                </div>

                <div class="mt-8 p-4 bg-gray-50 border-l-4 border-indigo-500 rounded-r-lg">
                    <p class="text-xs text-gray-600 italic">
                        <i class="fa-solid fa-circle-info text-indigo-500 mr-2"></i>
                        Data statistik ini disinkronkan secara otomatis dengan database setiap ada perubahan laporan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>