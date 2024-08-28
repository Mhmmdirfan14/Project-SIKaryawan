<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard')->with('success', 'Anda berhasil Login!');
        }
        return redirect()->back()->with('error', 'Login gagal, silakan coba lagi!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
