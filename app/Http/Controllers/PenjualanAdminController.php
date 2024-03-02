<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use Alert;
use PDF;

class PenjualanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::orderBy('id', 'desc')->paginate();
        return view('admin.penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'tanggal_penjualan' => now(),
            'id_user' => auth()->user()->id,
            'nama_kasir' => auth()->user()->nama_lengkap,
            'total_harga' => 0,
            'bayar' => 0,
            'kembali' => 0,
        ];
    
        $penjualan = Penjualan::create($data);
        return redirect('admin/penjualan/'.$penjualan->id.'/edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::get();
        $pelanggan = Pelanggan::get();

        $id_produk = request('id_produk');
        $produkdetail = Produk::find($id_produk);

        $id_pelanggan = request('id_pelanggan');
        $memberdetail = Pelanggan::find($id_pelanggan);

        $detailpenjualan = DetailPenjualan::whereIdPenjualan($id)->get();

        $act = request('act');
        $qty = request('qty');
        if ($act == 'min') {
            if ($qty <= 1) {
                $qty = 1;
            }else {
                $qty = $qty - 1;
            }
        }else {
            $qty = $qty + 1;
        }

        $subtotal = 0;
        if ($produkdetail) {
            $subtotal = $qty * $produkdetail->harga_jual;
        }

        $penjualan = Penjualan::find($id);

        $bayar = request('bayar');
        $kembali = $bayar - $penjualan->total_harga;

        $print = request('print');

        $data = [
            'produk' => $produk,
            'pelanggan' => $pelanggan,
            'produkdetail' => $produkdetail,
            'memberdetail' => $memberdetail,
            'qty' => $qty,
            'subtotal' => $subtotal,
            'detailpenjualan' => $detailpenjualan,
            'penjualan' => $penjualan,
            'bayar' => $bayar,
            'kembali' => $kembali,
            'print' => $print,
        ];

        if ($print == 'klik') {
            $customPaper = array(0,0,567.00,283.80);
            $pdf = PDF::loadView('admin.penjualan.print', $data)->setPaper($customPaper, 'landscape');
            return $pdf->stream();
        }else {
            return view('admin.penjualan.create', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penjualan::destroy($id);
        Alert::success('Selamat', 'Transaksi Berhasil Dihapus');
        return redirect('/admin/penjualan');
    }
}
