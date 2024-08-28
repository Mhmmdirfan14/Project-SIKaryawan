<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }

    public function simpanregister(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'karyawan',
            'remember_token' => Str::random(60),
            
        ]);

        return redirect()->route('register.index')->with('success', 'Anda berhasil Regristrasi!');
    }
}
