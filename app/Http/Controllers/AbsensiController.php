<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Keterangan;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensis = Absensi::with('karyawan:id,nama')->get();
        return view('absensi.index', compact('absensis'));
    }

    public function masuk()
    {
        return view('absensi.masuk');
    }

    public function keluar()
    {
        return view('absensi.Keluar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::select('id', 'nama')->get();
        return view('absensi.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
    
        // Cek apakah ada keterangan untuk karyawan ini pada hari ini
        $hasKeteranganToday = Keterangan::where('karyawan_id', auth()->user()->id)
            ->whereDate('tanggal', $tanggal)
            ->exists();
            
        if ($hasKeteranganToday) {
            return redirect()->back()->withErrors(['msg' => 'Anda telah melakukan izin atau sakit tidak bisa melakukan absensi!']);
        }
    
        // Cek apakah sudah melakukan absensi hari ini
        $absensi = Absensi::where([
            ['karyawan_id', '=', auth()->user()->id],
            ['tanggal', '=', $tanggal],
        ])->first();
    
        if ($absensi) {
            return redirect()->back()->withErrors(['msg' => 'Anda telah melakukan absensi masuk hari ini!']);
        } else {
            // Buat catatan absensi baru
            Absensi::create([
                'karyawan_id' => auth()->user()->id,
                'tanggal' => $tanggal,
                'jam_masuk' => $localtime,
            ]);
    
            return redirect()->back()->with('success', 'Absensi masuk berhasil');
        }

    
        // $data = $request->validate([
        //     'karyawan_id' => "required|max: 255",
        //     'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);


        // $data['tanggal'] = Carbon::now()->toDateString();
        // $data['jam_masuk'] = Carbon::now()->toTimeString();
        // $data['jam_keluar'] = null;


        // return redirect()->route('absensi.index');
    }

    public function absensiKeluar()
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
    
        $absensi = Absensi::where([
            ['karyawan_id', '=', auth()->user()->id],
            ['tanggal', '=', $tanggal],
        ])->first();
    
        // Check if the user has not checked in for the day
        if (!$absensi || !$absensi->jam_masuk) {
            return redirect()->back()->withErrors(['msg' => 'Anda belum melakukan absensi masuk pada hari ini!']);
        }
    
        $dt = [
            'jam_keluar' => $localtime,
            'jam_kerja' => date('H:i:s', strtotime($localtime) - strtotime($absensi->jam_masuk))
        ];
    
        // Check if the user has already checked out for the day
        if ($absensi->jam_keluar == "") {
            $absensi->update($dt);
            return redirect()->back()->with('success', 'Absensi keluar berhasil');
        } else {
            return redirect()->back()->withErrors(['msg' => 'Anda telah melakukan absensi keluar hari ini!']);
        }
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absensi = Absensi::find($id);
        $karyawans = Karyawan::select('id', 'nama')->get();
        return view('absensi.edit', compact('absensi', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
    
        $data = $request->validate([
            'jam_masuk' => 'required|date_format:H:i:s',
            'jam_keluar' => 'required|date_format:H:i:s',
        ]);
    
        // Calculate jam_kerja
        $jam_masuk = strtotime($data['jam_masuk']);
        $jam_keluar = strtotime($data['jam_keluar']);
        $jam_kerja_seconds = $jam_keluar - $jam_masuk;
    
        // Convert jam_kerja to H:i:s format
        $hours = floor($jam_kerja_seconds / 3600);
        $minutes = floor(($jam_kerja_seconds / 60) % 60);
        $seconds = $jam_kerja_seconds % 60;
        $jam_kerja = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    
        // Add jam_kerja to the data array
        $data['jam_kerja'] = $jam_kerja;
    
        $absensi->update($data);
    
        return redirect()->route('absensi.index')->with('success', 'Absensi updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $absensi = Absensi::findOrFail($id);

        if ($absensi->foto) {
            Storage::disk('public')->delete($absensi->foto);
        }

        $absensi->delete();

        return redirect()->route('absensi.index');
    }
}
