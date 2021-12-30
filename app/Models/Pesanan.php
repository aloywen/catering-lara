<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pesanan extends Model
{
    protected $fillable = ['code_pesanan','customer_id', 'nama_produk', 'jumlah', 'harga', 'pemesan', 'no_hp', 'alamat', 'bukti_pembayaran', 'status_pembayaran', 'keterangan', 'gambar'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
