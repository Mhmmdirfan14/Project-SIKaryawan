<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $table = 'keterangan';

    protected $fillable = [
        'karyawan_id',
        'tanggal', 
        'keterangan',
        'alasan',
        'foto',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
