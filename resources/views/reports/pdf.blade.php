<!DOCTYPE html>
<html>
<head>
    <title>Laporan PKL Kominfo Binjai</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; line-height: 1.6; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h2 { margin: 0; text-transform: uppercase; }
        .header p { margin: 0; font-size: 10px; }
        .title { text-align: center; font-weight: bold; margin-bottom: 20px; text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
        .footer { margin-top: 30px; float: right; width: 200px; text-align: center; }
        .clear { clear: both; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Pemerintah Kota Binjai</h2>
        <h3>Dinas Komunikasi dan Informatika</h3>
        <p>Alamat: Jl. Jenderal Sudirman No. 6, Kota Binjai, Sumatera Utara</p>
    </div>

    <div class="title">LAPORAN KEGIATAN HARIAN MAHASISWA PKL</div>

    <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Instansi:</strong> Dinas Kominfo Kota Binjai</p>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Tanggal</th>
                <th width="60%">Kegiatan / Pekerjaan</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $index => $report)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($report->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $report->kegiatan }}</td>
                <td style="text-align: center;">{{ ucfirst($report->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Binjai, {{ date('d F Y') }}</p>
        <br><br><br>
        <p><strong>( ________________ )</strong><br>Pembimbing Lapangan</p>
    </div>
</body>
</html>