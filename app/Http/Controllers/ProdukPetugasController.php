<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\Kategori;
use Alert;
use PDF;

class ProdukPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::orderBy('id', 'desc')->paginate();
        return view('petugas.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::get();
        $data = [
            'kategori' => $kategori,
        ];
        return view('petugas.produk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'nama_kategori' => 'required|max:255',
            'harga_beli' => 'required|max:255',
            'harga_jual' => 'required|max:255',
            'satuan' => 'required|max:255',
            'stok' => 'required|max:255',
        ]);

        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->nama_kategori = $request->nama_kategori;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
        $produk->satuan = $request->satuan;
        $produk->stok = $request->stok;
        $produk->save();

        Alert::success('Selamat', 'Produk Berhasil Ditambahkan');
        return redirect()->route('produkpetugas');
    }

    /**
     * Display the specified resource.
     */
    public function print()
    {
        $produk = Produk::orderBy('stok', 'desc')->get();

        $pdf = PDF::loadView('petugas.laporan.laporan-produk', compact('produk'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::get();
        $data = [
            'produk' => $produk,
            'kategori' => $kategori,
        ];
        return view('petugas.produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'nama_kategori' => 'required|max:255',
            'harga_beli' => 'required|max:255',
            'harga_jual' => 'required|max:255',
            'satuan' => 'required|max:255',
            'stok' => 'required|max:255',
        ]);

        $produk = Produk::find($id);

        $produk->nama_produk = $request->nama_produk;
        $produk->nama_kategori = $request->nama_kategori;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
        $produk->satuan = $request->satuan;
        $produk->stok = $request->stok;
        $produk->save();

        Alert::success('Selamat', 'Produk Berhasil Diedit');
        return redirect()->route('produkpetugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::destroy($id);
        Alert::success('Selamat', 'Produk Berhasil Dihapus');
        return redirect()->route('produkpetugas');
    }
}
