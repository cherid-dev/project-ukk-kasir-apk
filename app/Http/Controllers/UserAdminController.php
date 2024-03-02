<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Alert;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'username' => 'required|max:10',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'role' => 'required|max:255',
            'usia' => 'required|max:255'
        ]);

        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => $request->role,
            'usia' => $request->usia,
        ]);

        Alert::success('Selamat', 'Register Berhasil');
        return redirect()->route('useradmin');
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
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'username' => 'required|max:10',
            'email' => 'required|email|unique:users,email|max:255',
            'jenis_kelamin' => 'required|max:255',
            'role' => 'required|max:255',
            'usia' => 'required|max:255'
        ]);

        $user = User::find($id);

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->role = $request->role;
        $user->usia = $request->usia;
        $user->update();

        Alert::success('Selamat', 'User Berhasil Diedit');
        return redirect()->route('useradmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        Alert::success('Selamat', 'User Berhasil Dihapus');
        return redirect()->route('useradmin');
    }
}
