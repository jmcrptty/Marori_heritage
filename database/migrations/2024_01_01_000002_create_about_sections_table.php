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
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();
            $table->string('badge', 100);
            $table->string('title', 200);
            $table->text('subtitle');
            $table->string('who_title', 200);
            $table->text('who_paragraph1');
            $table->text('who_paragraph2');
            $table->string('vision_title', 200);
            $table->text('vision_text');
            $table->text('mission_text');
            $table->string('stat1_number', 20);
            $table->string('stat1_label', 100);
            $table->string('stat2_number', 20);
            $table->string('stat2_label', 100);
            $table->string('stat3_number', 20);
            $table->string('stat3_label', 100);
            $table->string('about_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
