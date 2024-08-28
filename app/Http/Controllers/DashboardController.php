<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Karyawan;
use App\Models\Keterangan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $hariIni = Carbon::today()->toDateString();

        // Hitung jumlah karyawan yang hadir hari ini
        $jumlahHadir = Absensi::whereDate('tanggal', $hariIni)->count();

        // Hitung jumlah karyawan yang tidak hadir hari ini berdasarkan tabel Keterangan
        $jumlahTidakHadir = Keterangan::whereDate('tanggal', $hariIni)->count();

        return view('dashboard.index', compact('jumlahHadir', 'jumlahTidakHadir'));
    }
}
