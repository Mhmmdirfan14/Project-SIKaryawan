<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'nik', 
        'nama', 
        'tmp_lahir', 
        'tgl_lahir',
        'jekel', 
        'agama',
        'alamat',
        'no_telp',
        'divisi_id',
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function keterangan()
    {
        return $this->hasMany(Keterangan::class);
    }
}
