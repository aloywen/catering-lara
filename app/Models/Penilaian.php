<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'deskripsi',
        'penilaian',
        'nama_paket_id',
        'nama_id',
        'gambar',
    ];
}
