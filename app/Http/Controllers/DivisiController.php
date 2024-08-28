<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index(){

        $divisis = Divisi::all();
        return view('divisi.index', compact('divisis'));
    }

    
    public function create()
    {
        return view('divisi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => "required|max: 255",
            'nama' => "required|max: 255",
          
        ]);

        Divisi::create($data);

        return redirect()->route('divisi.index');
    }

    public function edit(string $id)
    {
        $divisi = Divisi::find($id);
        return view('divisi.edit', compact('divisi'));
    }

   
    public function update(Request $request, $id)
    {
        $divisi = Divisi::findOrFail($id);
        
        $data = $request->validate([
            'kode' => 'required|max:255',
            'nama' => 'required|max:255',
        ]);

        $divisi->update($data);

        return redirect()->route('divisi.index');
    }

    
    public function destroy(string $id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        return redirect()->route('divisi.index');
    }
}
