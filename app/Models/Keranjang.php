<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $fillable = ['customer_id', 'nama_produk', 'harga', 'gambar', 'no_hp'];
}
