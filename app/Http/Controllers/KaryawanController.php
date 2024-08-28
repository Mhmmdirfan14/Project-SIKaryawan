<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('karyawan.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisis = Divisi::all();
        return view('karyawan.create', compact('divisis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'nik' => "required|max: 255",
            'nama' => "required|max: 255",
            'tmp_lahir' => "required|max: 255",
            'tgl_lahir' => "required|date",
            'jekel' => 'required|in:Laki-Laki,Perempuan',
            'agama' => "required|max: 255",
            'alamat' => "required|max: 255",
            'no_telp' => "required|max: 255",
            'divisi_id' => "required|exists:divisi,id",
        ]);

        Karyawan::create($data);

        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $user = User::find($id);
        $divisis = Divisi::all();
        return view('karyawan.edit', compact('user', 'divisis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => "required|max:255",
            'email' => "required|max:255",

        ]);

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('karyawan.index');
    }
}
