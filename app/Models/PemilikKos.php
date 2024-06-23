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
}
