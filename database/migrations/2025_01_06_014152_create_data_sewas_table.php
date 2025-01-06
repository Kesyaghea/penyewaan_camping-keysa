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
        Schema::create('data_sewas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyewa');
            $table->string('nama_product');
            $table->string('gambar');
            $table->integer('tanggal_sewa');
            $table->integer('tanggal_pengembalian');
            $table->integer('total_sewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sewas');
    }
};
