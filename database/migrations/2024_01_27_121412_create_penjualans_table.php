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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_penjualan');
            $table->decimal('total_harga', $precision = 65, $scale = 2);
            $table->decimal('bayar', $precision = 65, $scale = 2);
            $table->decimal('kembali', $precision = 65, $scale = 2);
            $table->unsignedBigInteger('id_pelanggan')->nullable();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_pelanggan')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_kasir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
