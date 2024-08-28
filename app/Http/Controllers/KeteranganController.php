<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Keterangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $keterangans = Keterangan::all();
        return view('keterangan.index', compact('keterangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::select('id', 'nama')->get();
        return view('keterangan.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tanggal' => "required|date",
            'keterangan' => 'required|in:Izin,Sakit,Lainnya',
            'alasan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('foto')) {
            $data['foto'] = $request->file('foto')->store('keterangan-foto');
        }

        $data['karyawan_id'] = auth()->user()->id;

        $hasAbsensiToday = Absensi::where('karyawan_id', $data['karyawan_id'])
            ->whereDate('tanggal', Carbon::today())
            ->exists();

        if ($hasAbsensiToday) {
            return redirect()->back()->withErrors(['msg' => 'Karyawan sudah melakukan absensi hari ini dan tidak bisa melakukan izin atau sakit pada hari yang sama.']);
        }

        Keterangan::create($data);

        return redirect()->back()->with('success', 'Keterangan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keterangan $keterangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $keterangan = Keterangan::find($id);
        $karyawans = Karyawan::select('id', 'nama')->get();
        return view('keterangan.edit', compact('keterangan', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'karyawan_id' => "required|max:255",
            'tanggal' => "required|date",
            'keterangan' => 'required|in:Izin,Sakit,Lainnya',
            'alasan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $keterangan = Keterangan::findOrFail($id);
    
        if ($request->hasFile('foto')) {
            // Delete the old photo if it exists
            if ($keterangan->foto) {
                Storage::delete($keterangan->foto);
            }
    
            // Store the new photo
            $data['foto'] = $request->file('foto')->store('keterangan-foto');
        }
    
        $karyawan_id = auth()->user()->id;
    
        $hasAbsensi = Absensi::where('karyawan_id', $karyawan_id)
            ->whereDate('tanggal', $data['tanggal'])
            ->where('id', '!=', $id) // Exclude the current record
            ->exists();
    
        if ($hasAbsensi) {
            return redirect()->back()->withErrors(['msg' => 'Karyawan sudah melakukan absensi pada hari ini dan tidak bisa melakukan izin atau sakit.']);
        }
    
        $keterangan->update($data);
    
        return redirect()->route('keterangan.index')->with('success', 'Keterangan berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keterangan = Keterangan::findOrFail($id);
        $keterangan->delete();

        return redirect()->route('keterangan.index');
    }
}
