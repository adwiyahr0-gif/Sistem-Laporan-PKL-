<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kegiatan PKL</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif; /* Font formal untuk dokumen legal/resmi */
            font-size: 12pt;
            line-height: 1.5;
            color: #333;
            margin: 0.5cm;
        }
        .header {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h2 { margin: 0; text-transform: uppercase; font-size: 16pt; }
        .header p { margin: 5px 0; font-size: 10pt; }
        
        .info-user {
            margin-bottom: 20px;
            width: 100%;
        }
        .info-user td { padding: 3px 0; }

        table.main-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.main-table th, table.main-table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        table.main-table th {
            background-color: #f2f2f2;
            text-align: center;
            text-transform: uppercase;
            font-size: 10pt;
        }
        .text-center { text-align: center; }
        .status-badge {
            font-size: 9pt;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        .footer-sign {
            margin-top: 50px;
            width: 100%;
        }
        .footer-sign td {
            width: 50%;
            text-align: center;
        }
        .space-sign { height: 80px; }
    </style>
</head>
<body>

    <div class="header">
        <h2>LAPORAN KEGIATAN MAHASISWA PKL</h2>
        <h2>DINAS KOMINFO KOTA BINJAI</h2>
        <p>Alamat: Jl. Jendral Sudirman No. 6, Kota Binjai, Sumatera Utara</p>
    </div>

    <table class="info-user">
        <tr>
            <td width="150">Nama Mahasiswa</td>
            <td width="20">:</td>
            <td><strong>{{ Auth::user()->name }}</strong></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ Auth::user()->email }}</td>
        </tr>
        <tr>
            <td>Periode Laporan</td>
            <td>:</td>
            <td>{{ now()->translatedFormat('F Y') }}</td>
        </tr>
    </table>

    <table class="main-table">
        <thead>
            <tr>
                <th width="30">No</th>
                <th width="100">Tanggal</th>
                <th>Deskripsi Kegiatan / Pekerjaan</th>
                <th width="80">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $index => $report)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($report->tanggal)->format('d/m/Y') }}</td>
                <td>{{ $report->kegiatan }}</td>
                <td class="text-center">
                    <span class="status-badge">{{ $report->status }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="footer-sign">
        <tr>
            <td>
                <p>Mengetahui,</p>
                <p>Pembimbing Lapangan</p>
                <div class="space-sign"></div>
                <p>__________________________</p>
            </td>
            <td>
                <p>Binjai, {{ now()->translatedFormat('d F Y') }}</p>
                <p>Mahasiswa PKL</p>
                <div class="space-sign"></div>
                <p><strong>{{ Auth::user()->name }}</strong></p>
            </td>
        </tr>
    </table>

</body>
</html>