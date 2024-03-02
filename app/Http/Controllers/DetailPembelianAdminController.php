<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPembelian;
use App\Models\Pembelian;
use Alert;

class DetailPembelianAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id_pembelian = $request->id_pembelian;

        $pembelian = Pembelian::find($id_pembelian);

        $pembelian->id_supplier = $request->id_supplier;
        $pembelian->nama_supplier = $request->nama_supplier;
        $pembelian->save();

        return redirect('admin/pembelian/'.$id_pembelian.'/edit');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_pembelian = $request->id_pembelian;
        $id_produk = $request->id_produk;

        $dp = DetailPembelian::whereIdProduk($id_produk)->whereIdPembelian($id_pembelian)->first();

        $pembelian = Pembelian::find($id_pembelian);

        if ($dp == null) {
            $data = [
                'id_pembelian' => $request->id_pembelian,
                'id_produk' => $request->id_produk,
                'nama_produk' => $request->nama_produk,
                'harga_beli' => $request->harga_beli,
                'jumlah_produk' => $request->jumlah_produk,
                'subtotal' => $request->subtotal,
            ];
            DetailPembelian::create($data);

            $dt = [
                'total_harga' => $request->subtotal + $pembelian->total_harga,
            ];
            $pembelian->update($dt);
        }else {
            $data = [
                'harga_beli' => $request->harga_beli,
                'jumlah_produk' =>$dp->jumlah_produk + $request->jumlah_produk,
                'subtotal' =>$dp->subtotal + $request->subtotal,
            ];
            $dp->update($data);

            $dt = [
                'total_harga' => $request->subtotal + $pembelian->total_harga,
            ];
            $pembelian->update($dt);
        }
        return redirect('admin/pembelian/'.$id_pembelian.'/edit');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id_pembelian = $request->id_pembelian;

        $pembelian = Pembelian::find($id_pembelian);

        $pembelian->bayar = $request->bayar;
        $pembelian->kembali = $request->kembali;
        $pembelian->save();

        Alert::success('Selamat', 'Transaksi Berhasil Disimpan');
        return redirect('admin/pembelian/'.$id_pembelian.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $id = request('id');
        $td = DetailPembelian::find($id);

        $pembelian = Pembelian::find($td->id_pembelian);

        $data = [
            'total_harga' => $pembelian->total_harga - $td->subtotal,
        ];
        $pembelian->update($data);
        
        $td->delete();
        return redirect()->back();
    }
}
