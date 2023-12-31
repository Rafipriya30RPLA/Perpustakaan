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
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->unsignedBigInteger('id_tambahbuku');
            $table->string('kode_buku');
            $table->string('tanggal_pinjam');
            $table->string('tenggat');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_tambahbuku')->references('id')->on('tambahbukus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjams');
    }
};
