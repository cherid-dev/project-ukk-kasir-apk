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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 255);
            $table->string('username');
            $table->string('email', 255)->unique();
            $table->string('password');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('role', ['Admin', 'Petugas']);
            $table->string('usia');
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
