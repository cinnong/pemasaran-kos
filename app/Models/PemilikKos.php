<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PemilikKos extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function datakos()
    {
        return $this->hasMany(Datakos::class, 'pemilik_kos_id');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'pemilik_kos_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($pemilikKos) {
            $pemilikKos->datakos()->delete();
            $pemilikKos->pemesanan()->delete();
            // Tambahkan penghapusan data terkait lainnya
        });
    }
}
