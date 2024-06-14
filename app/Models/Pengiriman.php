<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_petugas',
        'id_pengirim',
        'nama_penerima',
        'alamat_penerima',
        'nohp_penerima',
        'id_kendaraan',
        'tanggal_dikirim',
        'nama_barang',
        'berat_barang',
        'jumlah',
        'harga',
        'status',
    ];

    public function pengirim()
    {
        return $this->belongsTo(Pengirim::class, 'id_pengirim');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan');
    }
    protected $table = 'pengirimans';
}
