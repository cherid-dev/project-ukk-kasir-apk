<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Alert;

class PelangganAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::orderBy('id', 'desc')->paginate();
        return view('admin.member.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'alamat' => 'required|max:5000',
            'no_telp' => 'required|max:255'
        ]);

        $user = Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        Alert::success('Selamat', 'Member Berhasil Ditambahkan');
        return redirect()->route('memberadmin');
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
        $pelanggan = Pelanggan::find($id);
        return view('admin.member.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'alamat' => 'required|max:5000',
            'no_telp' => 'required|max:255'
        ]);

        $pelanggan = Pelanggan::find($id);

        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->jenis_kelamin = $request->jenis_kelamin;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->save();

        Alert::success('Selamat', 'Member Berhasil Diedit');
        return redirect()->route('memberadmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelanggan::destroy($id);
        Alert::success('Selamat', 'Member Berhasil Dihapus');
        return redirect()->route('memberadmin');
    }
}
