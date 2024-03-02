<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Aplikasi | Minishop</title>

    <style>
        body {
            max-width: 100%;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 1.5rem;
            text-align: center;
        }
        .center {
            font-size: 1.2rem;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }
        .table th {
        padding: 8px 8p;
        border:1px solid #000000;
        text-align: center;
        }
        .table td {
            padding: 3px;
            border:1px solid #000000;
        }
        .text-center {
            text-align: center;
        }
        table tbody tr td {
            padding-bottom: 1rem;
        }
    </style>
</head>
<body>
    <h1>Minishop</h1>
    <h2 class="center">Laporan Aplikasi</h2>

    <table>
        <tbody>
            <tr>
                <td width="150px">Periode Tanggal</td>
                <td>: {{ Request::segment(4) }} - {{ Request::segment(5) }}</td>
            </tr>
        </tbody>
    </table>

    <h3>Data Penjualan</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Penjualan</th>
                <th>Total Belanja</th>
                <th>Nama Member</th>
                <th>Nama Kasir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $p)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $p->tanggal_penjualan }}</td>
                    <td>{{ format_rupiah($p->total_harga) }}</td>
                    <td>{{ $p->nama_pelanggan }}</td>
                    <td>{{ $p->nama_kasir }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Data Pembelian</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pembelian</th>
                <th>Total Belanja</th>
                <th>Nama Supplier</th>
                <th>Nama Kasir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelian as $pmb)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $pmb->tanggal_pembelian }}</td>
                    <td>{{ format_rupiah($pmb->total_harga) }}</td>
                    <td>{{ $pmb->nama_supplier }}</td>
                    <td>{{ $pmb->nama_kasir }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table>
        <tbody>
            <tr>
                <td width="150px">Total Pendapatan</td>
                <td>: {{ format_rupiah($penghasilan) }}</td>
            </tr>
            <tr>
                <td width="150px">Total Pengeluaran</td>
                <td>: {{ format_rupiah($pengeluaran) }}</td>
            </tr>
            <tr>
                <td width="150px">Total Laba</td>
                <td>: {{ format_rupiah($laba) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>