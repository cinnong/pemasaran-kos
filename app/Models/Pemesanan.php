<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';

    protected $fillable = [
        'user_id',
        'tanggal_pemesanan',
        'tanggal_masuk',
        'tanggal_keluar',
        'tipe_kos',
        'per_bulan',
        'harga',
        'total_biaya',
        'status_pemesanan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'pemesanan_id');
    }
}
