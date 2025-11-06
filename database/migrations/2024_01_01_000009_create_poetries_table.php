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
        Schema::create('poetries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Judul puisi
            $table->text('content'); // Puisi dalam bahasa Marori
            $table->text('translation'); // Terjemahan dalam bahasa Indonesia
            $table->string('audio_file')->nullable(); // Path file audio MP3
            $table->string('author')->nullable(); // Nama penulis
            $table->boolean('is_active')->default(true); // Status aktif/tidak
            $table->integer('order')->default(0); // Urutan tampil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poetries');
    }
};
