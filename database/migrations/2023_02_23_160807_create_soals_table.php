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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->string('soal');
            $table->string('pilA');
            $table->string('pilB');
            $table->string('pilC');
            $table->string('pilD');
            $table->string('kunci');
            $table->enum('status', ['benar', 'salah', 'belum dijawab'])->default('belum dijawab');
            $table->integer('score');
            $table->enum('jawab', ['A','B','C','D', ''])->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};
