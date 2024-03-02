<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Produk | Minishop</title>

    <style>
        body {
            max-width: 100%;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 1.5rem;
            text-align: center;
        }
        h2 {
            font-size: 1.2rem;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000000;
            margin-bottom: 10px;
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
    </style>
</head>
<body>
    <h1>Minishop</h1>
    <h2>Laporan Data Produk</h2>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Satuan</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $p)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->nama_kategori }}</td>
                <td >{{ format_rupiah($p->harga_beli) }}</td>
                <td>{{ format_rupiah($p->harga_jual) }}</td>
                <td>{{ $p->satuan }}</td>
                <td>{{ $p->stok }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
