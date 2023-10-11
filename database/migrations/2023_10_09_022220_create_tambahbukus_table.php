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
        Schema::create('tambahbukus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_buku');
            $table->string('deskripsi');
            $table->string('kode_buku');
            $table->string('nama_penulis');
            $table->string('nama_penerbit');
            $table->string('tanggal_terbit');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tambahbukus');
    }
};
