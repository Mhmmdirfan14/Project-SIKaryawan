<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';

    protected $fillable = [
        'kode',
        'nama',
    ];
    
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
}
