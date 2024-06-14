<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
  use HasFactory;
  protected $fillable = [
    'id_user',
    'nama',
    'alamat',
    'no_hp',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'id_user');
  }

  public function pengiriman()
  {
    return $this->hasMany(Pengiriman::class, 'id_pengirim');
  }

  public function getWarnaAttribute($value)
  {
    return $value ?? 'Unknown'; // If warna is null, return 'Unknown'
  }
}
