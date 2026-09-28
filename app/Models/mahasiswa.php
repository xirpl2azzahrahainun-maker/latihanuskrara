<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    // Menentukan nama tabel di phpMyAdmin secara eksplisit
    protected $table = 'mahasiswas';

    protected $fillable = [
        'npm',
        'nama',
        'prodi',
        'tahunmasuk',
    ];
}
