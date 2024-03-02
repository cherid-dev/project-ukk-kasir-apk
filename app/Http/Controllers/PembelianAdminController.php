<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use App\Models\Produk;
use App\Models\Pembelian;
use App\Models\DetailPembelian;
use Alert;
use PDF;

class PembelianAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::orderBy('id', 'desc')->paginate();
        return view('admin.pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'tanggal_pembelian' => now(),
            'id_user' => auth()->user()->id,
            'nama_kasir' => auth()->user()->nama_lengkap,
            'total_harga' => 0,
            'bayar' => 0,
            'kembali' => 0,
        ];
    
        $pembelian = Pembelian::create($data);
        return redirect('admin/pembelian/'.$pembelian->id.'/edit');
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
        $supplier = Supplier::get();

        $id_produk = request('id_produk');
        $produkdetail = Produk::find($id_produk);

        $id_supplier = request('id_supplier');
        $supplierdetail = Supplier::find($id_supplier);

        $detailpembelian = DetailPembelian::whereIdPembelian($id)->get();

        $pembelian = Pembelian::find($id);

        $bayar = request('bayar');
        $kembali = $bayar - $pembelian->total_harga;

        $print = request('print');

        $data = [
            'produk' => $produk,
            'supplier' => $supplier,
            'produkdetail' => $produkdetail,
            'supplierdetail' => $supplierdetail,
            'detailpembelian' => $detailpembelian,
            'pembelian' => $pembelian,
            'bayar' => $bayar,
            'kembali' => $kembali,
            'print' => $print,
        ];

        if ($print == 'klik') {
            $customPaper = array(0,0,567.00,283.80);
            $pdf = PDF::loadView('admin.pembelian.print', $data)->setPaper($customPaper, 'landscape');
            return $pdf->stream();
        }else {
            return view('admin.pembelian.create', $data);
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
        Pembelian::destroy($id);
        Alert::success('Selamat', 'Transaksi Berhasil Dihapus');
        return redirect('/admin/pembelian');
    }
}
