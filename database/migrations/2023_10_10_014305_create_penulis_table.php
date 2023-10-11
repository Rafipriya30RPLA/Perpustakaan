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
        Schema::create('penulis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penulis');
            $table->string('nama_penerbit');
<<<<<<< Updated upstream:database/migrations/2023_10_09_022220_create_tambahbukus_table.php
            $table->string('tanggal_terbit');
            $table->string('foto');
=======
>>>>>>> Stashed changes:database/migrations/2023_10_10_014305_create_penulis_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penulis');
    }
};
