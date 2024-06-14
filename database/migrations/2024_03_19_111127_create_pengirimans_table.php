<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_petugas')->nullable();
            $table->unsignedBigInteger('id_pengirim')->nullable();
            $table->string('nama_penerima')->nullable();
            $table->string('alamat_penerima')->nullable();
            $table->string('nohp_penerima')->nullable();
            $table->unsignedBigInteger('id_kendaraan')->nullable();
            $table->string('tanggal_dikirim')->nullable();
            $table->string('foto_penyerahan')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('berat_barang')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('harga')->nullable();
            $table->enum('status', ['proses', 'diterima', 'dikirim', 'terkirim', 'selesai'])->nullable();

            $table->foreign('id_petugas')->references('id')->on('petugas');
            $table->foreign('id_pengirim')->references('id')->on('pengirims');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimans');
    }
};
