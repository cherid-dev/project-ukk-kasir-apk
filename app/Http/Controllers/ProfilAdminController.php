<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;

class ProfilAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());

        return view('admin.profil.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $user = User::find($id);

        $user->nama_lengkap = $request->nama_lengkap;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->usia = $request->usia;
        $user->jenis_kelamin = $request->jenis_kelamin;

        if (request()->hasFile('avatar')) {
            if($user->avatar && file_exists(storage_path('app/public/avatar/' . $user->avatar))){
                Storage::delete('app/public/avatar/'.$user->avatar);
            }
    
            $file = $request->file('avatar');
            $slug = Str::slug($file->getClientOriginalExtension());
            $fileName = time() .'.'. $slug;
            $request->avatar->move('storage/avatar/', $fileName);
            $user->avatar = 'storage/avatar/'.$fileName;
        }
        $user->save();

        return back()->with('status', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user->delete();
        return redirect()->route('profiladmin')->with('success','profil has been deleted successfully');
    }
}
