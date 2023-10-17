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
            $table->string('kode_buku');
            $table->unsignedBigInteger('id_penulis');
            $table->string('tanggal_terbit');
            $table->string('deskripsi');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('id_penulis')->references('id')->on('penulis')->onDelete('restrict');
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
