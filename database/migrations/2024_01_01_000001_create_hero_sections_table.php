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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge', 100);
            $table->string('title', 200);
            $table->string('subtitle', 300);
            $table->text('description');
            $table->string('btn_primary_text', 100);
            $table->string('btn_primary_link', 255);
            $table->string('btn_secondary_text', 100);
            $table->string('btn_secondary_link', 255);
            $table->string('background_image')->nullable();
            $table->boolean('enable_video_background')->default(false);
            $table->string('video_youtube_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
