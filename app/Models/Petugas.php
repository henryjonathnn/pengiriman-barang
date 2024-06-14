<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'umur',
        'no_hp',
        'foto',
    ];

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'id_petugas');
    }
}
