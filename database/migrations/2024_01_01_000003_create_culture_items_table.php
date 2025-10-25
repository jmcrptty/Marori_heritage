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
        Schema::create('culture_items', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('category', 100); // Kesenian, Budaya, etc
            $table->string('image')->nullable(); // Image path in public folder
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culture_items');
    }
};
