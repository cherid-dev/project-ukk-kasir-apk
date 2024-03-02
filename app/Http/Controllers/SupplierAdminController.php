<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Alert;

class SupplierAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::orderBy('id', 'desc')->paginate();
        return view('admin.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'alamat' => 'required|max:5000',
            'no_telp' => 'required|max:255'
        ]);

        $user = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        Alert::success('Selamat', 'Supplier Berhasil Ditambahkan');
        return redirect()->route('supplieradmin');
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
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_supplier' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'alamat' => 'required|max:5000',
            'no_telp' => 'required|max:255'
        ]);

        $supplier = Supplier::find($id);

        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->jenis_kelamin = $request->jenis_kelamin;
        $supplier->alamat = $request->alamat;
        $supplier->no_telp = $request->no_telp;
        $supplier->save();

        Alert::success('Selamat', 'Supplier Berhasil Diedit');
        return redirect()->route('supplieradmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::destroy($id);
        Alert::success('Selamat', 'Supplier Berhasil Dihapus');
        return redirect()->route('supplieradmin');
    }
}
