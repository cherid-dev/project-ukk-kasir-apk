<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use PDF;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = User::count();
        $produk = Produk::count();
        $supplier = Supplier::count();
        $pelanggan = Pelanggan::count();
        $pengeluaran = DB::table('pembelians')->sum('total_harga');
        $penghasilan = DB::table('penjualans')->sum('total_harga');
        $laba = $penghasilan - $pengeluaran;

        $data = [
            'pengguna' => $pengguna,
            'produk' => $produk,
            'supplier' => $supplier,
            'pelanggan' => $pelanggan,
            'pengeluaran' => $pengeluaran,
            'penghasilan' => $penghasilan,
            'laba' => $laba
        ];

        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function laporan($tanggalAwal, $tanggalAkhir)
    {
        $penjualan = Penjualan::whereBetween('tanggal_penjualan', [$tanggalAwal, $tanggalAkhir])->get();
        $pembelian = Pembelian::whereBetween('tanggal_pembelian', [$tanggalAwal, $tanggalAkhir])->get();
        $penghasilan = DB::table('penjualans')->whereBetween('tanggal_penjualan', [$tanggalAwal, $tanggalAkhir])->sum('total_harga');
        $pengeluaran = DB::table('pembelians')->whereBetween('tanggal_pembelian', [$tanggalAwal, $tanggalAkhir])->sum('total_harga');
        $laba = $penghasilan - $pengeluaran;

        $data = [
            'pembelian' => $pembelian,
            'penjualan' => $penjualan,
            'pengeluaran' => $pengeluaran,
            'penghasilan' => $penghasilan,
            'laba' => $laba
        ];

        $pdf = PDF::loadView('admin.laporan.laporan-aplikasi', $data)->setPaper('a4', 'potrait');
        return $pdf->stream();
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
        //
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
        //
    }
}
