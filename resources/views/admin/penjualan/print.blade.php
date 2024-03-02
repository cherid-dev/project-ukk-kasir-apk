<!DOCTYPE html>
<html>

<head>
    <title>Struk Belanja | Minishop</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .invoice {
            /* border: 1px solid #ccc; */
            padding: 10px;
            max-width: 800px;
            margin: 0 auto;
        }

        .invoice h2 {
            text-align: center;
        }

        .garis {
            border-top: 0;
            border-style: dashed;
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice th,
        .invoice td {
            /* border: 1px solid #ccc; */
            padding: 5px;
            text-align: left;
        }

        .invoice th {
            /* background-color: #f2f2f2; */
        }

        .total {
            /* border-top: 2px solid #ccc; */
            font-weight: bold;
        }

        .footer {
            /* border-top: 1px solid #ccc; */
            padding-top: 10px;
            text-align: center;
            margin-top: 10px;
            font-size: 10px;
            color: #666;
        }

        .kosong{
            opacity: 0;
        }
    </style>

</head>

<body>
    <div class="invoice">
        <h2>Minishop</h2>
        <p class="garis"></p>
        <table>
            <tr>
                <td>Id Penjualan</td>
                <td>: {{ $penjualan->id }}</td>
            </tr>
            <tr>
                <td>Kasir</td>
                <td>: {{ $penjualan->nama_kasir }}</td>
            </tr>
            <tr>
                <td>Pelanggan</td>
                <td>: {{ $penjualan->nama_pelanggan }}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ $penjualan->updated_at }}</td>
            </tr>
        </table>
        <p class="garis"></p>
        <table>
            <thead>
                <tr>
                    <th align="center">No</th>
                    <th align="center">Nama Produk</th>
                    <th align="center">Qty</th>
                    <th align="center">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailpenjualan as $dp)
                    <tr>
                        <td align="center">{{ $loop->iteration }}</td>
                        <td class="text-truncate">{{ $dp->nama_produk }}</td>
                        <td align="center">{{ $dp->jumlah_produk }}</td>
                        <td class="text-truncate">{{ format_rupiah($dp->subtotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="garis"></p>
        <table>
            <thead>
                <tr class="total">
                    <th colspan="2"></th>
                    <th colspan="2">Total</th>
                    <th>: {{ format_rupiah($penjualan->total_harga) }}</th>
                </tr>
                <tr class="total">
                    <th colspan="2"></th>
                    <th colspan="2">Bayar</th>
                    <th>: {{ format_rupiah($penjualan->bayar) }}</th>
                </tr>
                <tr class="total">
                    <th colspan="2" class="kosong">23517/02/2024</th>
                    <th colspan="2">Kembali</th>
                    <th>: {{ format_rupiah($penjualan->kembali) }}</th>
                </tr>
            </thead>
        </table>
        <div class="footer">Terimakasih Sudah Belanja Disini<br>Belanja Puas Harga Pas</div>
    </div>
</body>

</html>
