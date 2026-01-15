<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kegiatan PKL - {{ $user->name }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; font-size: 11pt; line-height: 1.4; color: #000; margin: 0.5cm; }
        
        /* Kop Surat */
        .kop-table { width: 100%; border-bottom: 3px double #000; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-table td { border: none !important; vertical-align: middle; }
        .logo-column { width: 70px; text-align: center; }
        .logo-img { width: 65px; height: auto; }
        .kop-text { text-align: center; padding-right: 70px; } 
        .kop-text h2 { margin: 0; font-size: 13pt; text-transform: uppercase; font-weight: normal; }
        .kop-text h1 { margin: 0; font-size: 15pt; text-transform: uppercase; font-weight: bold; }
        .kop-text p { margin: 0; font-size: 9pt; font-style: italic; }

        .judul-laporan { text-align: center; font-weight: bold; margin-bottom: 25px; text-transform: uppercase; }
        
        /* Table Info Mahasiswa */
        .info-table { width: 100%; margin-bottom: 20px; }
        .info-table td { border: none !important; padding: 2px 0; }

        /* Table Data Kegiatan */
        table.data-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table.data-table th, table.data-table td { border: 1px solid #000; padding: 8px; font-size: 10pt; }
        table.data-table th { background-color: #f2f2f2; text-align: center; text-transform: uppercase; }

        /* Tanda Tangan */
        .ttd-table { width: 100%; margin-top: 40px; border-collapse: collapse; }
        .ttd-table td { width: 50%; text-align: center; border: none !important; }
        .spacer-ttd { height: 75px; } /* Memberi jarak tanda tangan basah */
    </style>
</head>
<body>
    @php
        // Teknik Base64 agar TIDAK butuh GD Extension
        $path = public_path('images/binjai_logo.png'); // Pastikan file ini ada di public/images/
        $base64 = "";
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }
    @endphp

    <table class="kop-table">
        <tr>
            <td class="logo-column">
                @if($base64)
                    <img src="{{ $base64 }}" class="logo-img">
                @endif
            </td>
            <td class="kop-text">
                <h2>Pemerintah Kota Binjai</h2>
                <h1>Dinas Komunikasi dan Informatika</h1>
                <p>Alamat: Jl. Jenderal Sudirman No. 6, Kota Binjai, Sumatera Utara</p>
            </td>
        </tr>
    </table>

    <div class="judul-laporan">Laporan Kegiatan Mahasiswa PKL</div>

    <table class="info-table">
        <tr>
            <td width="150">Nama Mahasiswa</td>
            <td width="10">:</td>
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
            <td>{{ date('F Y') }}</td>
        </tr>
    </table>

    <table class="data-table">
        <thead>
            <tr>
                <th width="30">NO</th>
                <th width="100">TANGGAL</th>
                <th>DESKRIPSI KEGIATAN / PEKERJAAN</th>
                <th width="90">STATUS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $index => $report)
            <tr>
                <td style="text-align: center;">{{ $index + 1 }}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($report->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $report->kegiatan }}</td>
                <td style="text-align: center; font-weight: bold;">{{ strtoupper($report->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="ttd-table">
        <tr>
            <td>Mengetahui,<br>Pembimbing Lapangan</td>
            <td>Binjai, {{ date('d F Y') }}<br>Mahasiswa PKL</td>
        </tr>
        <tr>
            <td class="spacer-ttd"></td>
            <td class="spacer-ttd"></td>
        </tr>
        <tr>
            <td>( __________________________ )</td>
            <td><strong>{{ $user->name }}</strong></td>
        </tr>
    </table>
</body>
</html>