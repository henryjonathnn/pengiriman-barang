<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'merk',
        'no_plat',
        'warna',
        'foto',
    ];

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'id_kendaraan');
    }

}
