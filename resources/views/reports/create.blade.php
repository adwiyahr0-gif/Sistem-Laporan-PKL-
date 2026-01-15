<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Laporan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-5">Input Laporan Harian</h2>
        <form action="{{ route('reports.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-2">Tanggal</label>
                <input type="date" name="tanggal" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-2">Kegiatan</label>
                <textarea name="kegiatan" rows="4" class="w-full p-2 border rounded" placeholder="Apa yang kamu lakukan hari ini?" required></textarea>
            </div>
            <div class="flex justify-between">
                <a href="{{ route('reports.index') }}" class="text-gray-500 py-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow">Kirim Laporan</button>
            </div>
        </form>
    </div>
</body>
</html>