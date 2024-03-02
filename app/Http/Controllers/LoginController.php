<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('dashboardadmin');
            }
            elseif (Auth::user()->role == 'Petugas') {
                return redirect('/petugas/penjualan');
            }
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $request->validate([
            'username' => 'required|max:10',
            'password' => 'required|max:255',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::Attempt($data)) {
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('dashboardadmin');
            } elseif (Auth::user()->role == 'Petugas') {
                return redirect('/petugas/penjualan');
            }
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect()->route('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        Session::flash('success', 'Anda berhasil Logout');
        return redirect()->route('login');
    }
}
