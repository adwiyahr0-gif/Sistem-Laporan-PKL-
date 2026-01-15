<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Laporan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-5 text-blue-600">Edit Laporan Harian</h2>
        
        <form action="{{ route('reports.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Penting: Laravel butuh ini untuk update data --}}
            
            <div class="mb-4">
                <label class="block mb-2 font-semibold">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $report->tanggal }}" class="w-full p-2 border rounded focus:outline-blue-500" required>
            </div>
            
            <div class="mb-4">
                <label class="block mb-2 font-semibold">Kegiatan</label>
                <textarea name="kegiatan" rows="4" class="w-full p-2 border rounded focus:outline-blue-500" required>{{ $report->kegiatan }}</textarea>
            </div>
            
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('reports.index') }}" class="text-gray-500 hover:underline">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>