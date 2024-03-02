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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->string('nama_produk', 255);
            $table->decimal('harga_beli', $precision = 65, $scale = 2)->default(0);
            $table->decimal('harga_jual', $precision = 65, $scale = 2);
            $table->string('satuan', 255);
            $table->string('stok', 11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
