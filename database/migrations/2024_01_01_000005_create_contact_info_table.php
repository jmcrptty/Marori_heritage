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
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp', 50);
            $table->string('whatsapp_link', 255);
            $table->string('email', 100);
            $table->text('address');

            // Social Media
            $table->string('instagram')->nullable();
            $table->boolean('is_instagram_active')->default(false);
            $table->string('facebook')->nullable();
            $table->boolean('is_facebook_active')->default(false);
            $table->string('youtube')->nullable();
            $table->boolean('is_youtube_active')->default(false);
            $table->string('tiktok')->nullable();
            $table->boolean('is_tiktok_active')->default(false);
            $table->string('twitter')->nullable();
            $table->boolean('is_twitter_active')->default(false);

            // Marketplace
            $table->string('shopee_url')->nullable();
            $table->string('shopee_username', 100)->nullable();
            $table->boolean('is_shopee_active')->default(false);
            $table->string('tokopedia_url')->nullable();
            $table->string('tokopedia_store_name', 200)->nullable();
            $table->boolean('is_tokopedia_active')->default(false);

            // Google Maps
            $table->text('maps_embed_url')->nullable();
            $table->boolean('is_maps_active')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_info');
    }
};
