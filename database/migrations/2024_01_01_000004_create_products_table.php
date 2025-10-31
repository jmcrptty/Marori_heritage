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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('category', 100);
            $table->text('description');
            $table->string('price', 100); // Price display like "Rp 250.000 - Rp 500.000"
            $table->string('image')->nullable(); // Product photo
            $table->string('shopee_link')->nullable();
            $table->string('tokopedia_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
