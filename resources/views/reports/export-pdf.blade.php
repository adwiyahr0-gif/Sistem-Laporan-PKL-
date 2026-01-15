<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kegiatan PKL - {{ $user->name }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5; color: #000; }
        .kop-surat { border-bottom: 3px double #000; padding-bottom: 10px; margin-bottom: 20px; text-align: center; position: relative; }
        .logo-binjai { position: absolute; left: 0; top: 0; width: 80px; } /* Logo Bulat */
        .kop-text h2 { margin: 0; font-size: 14pt; text-transform: uppercase; }
        .kop-text h1 { margin: 0; font-size: 16pt; text-transform: uppercase; }
        .kop-text p { margin: 0; font-size: 10pt; font-style: italic; }
        
        .judul-laporan { text-align: center; text-decoration: underline; font-weight: bold; margin-bottom: 25px; text-transform: uppercase; }
        
        .info-table { width: 100%; margin-bottom: 20px; }
        .info-table td { vertical-align: top; }
        
        table.data-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table.data-table th, table.data-table td { border: 1px solid #000; padding: 8px; text-align: left; font-size: 11pt; }
        table.data-table th { background-color: #f2f2f2; text-align: center; text-transform: uppercase; }
        
        .ttd-container { margin-top: 40px; width: 100%; }
        .ttd-table { width: 100%; border: none; }
        .ttd-table td { width: 50%; text-align: center; border: none; }
        .spacer { height: 80px; }
    </style>
</head>
<body>
    <div class="kop-surat">
        <img src="{{ public_path('images/binjai_logo.png') }}" class="logo-binjai">
        <div class="kop-text">
            <h2>Pemerintah Kota Binjai</h2>
            <h1>Dinas Komunikasi dan Informatika</h1>
            <p>Jl. Jenderal Sudirman No. 6, Kota Binjai, Sumatera Utara</p>
        </div>
    </div>

    <div class="judul-laporan">Laporan Kegiatan Mahasiswa PKL</div>

    <table class="info-table">
        <tr>
            <td width="25%">Nama Mahasiswa</td>
            <td width="2%">:</td>
            <td><strong>{{ $user->name }}</strong></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Periode Laporan</td>
            <td>:</td>
            <td>{{ now()->format('F Y') }}</td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Tanggal</th>
                <th>Deskripsi Kegiatan / Pekerjaan</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $index => $report)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($report->date)->format('d/m/Y') }}</td>
                <td>{{ $report->description }}</td>
                <td style="text-align: center; font-weight: bold; font-size: 9pt;">{{ strtoupper($report->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd-container">
        <table class="ttd-table">
            <tr>
                <td>Mengetahui,<br>Pembimbing Lapangan</td>
                <td>Binjai, {{ now()->format('d F Y') }}<br>Mahasiswa PKL</td>
            </tr>
            <tr class="spacer">
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>( __________________________ )</td>
                <td><strong>{{ $user->name }}</strong></td>
            </tr>
        </table>
    </div>
</body>
</html>