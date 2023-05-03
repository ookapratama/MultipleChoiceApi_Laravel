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
            $table->string('nama'); // sudah ada
            $table->string('stb')->unique(); // sudah ada
            $table->string('email')->unique(); // sudah ada
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('agama',['Islam', 'Kristen', 'Katholik', 'Buddha', 'Hindu', 'Konghucu'])->nullable();
            $table->enum('jkl',['L', 'P'])->nullable();
            $table->string('no_hp'); // sudah ada
            $table->string('alamat'); // sudah ada
            $table->string('asal_sekolah')->nullable();
            $table->string('nm_ayah')->nullable();
            $table->string('nm_ibu')->nullable();
            $table->string('angkatan_kampus')->nullable();
            $table->enum('registrasi_ulang', ['Belum', 'Sudah'])->default('Belum');
            $table->enum('status', ['Pendaftar', 'Lulus', 'Tidak Lulus'])->default('Pendaftar');
            $table->longText('pengalaman_organisasi')->nullable();
            $table->longText('alasan_daftar')->nullable();
            $table->string('pas_foto')->nullable();
            $table->rememberToken();
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
