<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';

    protected $fillable = [
        'id_kos',
        'user_id',
        'pemilik_kos_id',
        'tanggal_pemesanan',
        'tanggal_masuk',
        'tanggal_keluar',
        'tipe_kos',
        'per_bulan',
        'harga',
        'total_biaya',
        'aksi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'pemesanan_id');
    }

    public function pemilikKos()
    {
        return $this->belongsTo(PemilikKos::class, 'pemilik_kos_id');
    }

    public function datakos()
    {
        return $this->belongsTo(Datakos::class, 'id_kos');
    }
}
