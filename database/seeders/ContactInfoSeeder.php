<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInfo::create([
            'whatsapp' => '+62 812-3456-7890',
            'whatsapp_link' => 'https://wa.me/6281234567890',
            'email' => 'marori@wasur.com',
            'address' => "Taman Nasional Wasur\nMerauke, Papua Selatan\nIndonesia",

            // Social Media
            'instagram' => 'https://instagram.com/maroriwasur',
            'is_instagram_active' => true,
            'facebook' => 'https://facebook.com/maroriwasur',
            'is_facebook_active' => true,
            'youtube' => 'https://youtube.com/@maroriwasur',
            'is_youtube_active' => true,
            'tiktok' => null, // Belum ada
            'is_tiktok_active' => false,
            'twitter' => null, // Belum ada
            'is_twitter_active' => false,

            // Marketplace
            'shopee_url' => 'https://shopee.co.id/marori.official',
            'shopee_username' => '@marori.official',
            'is_shopee_active' => true,
            'tokopedia_url' => null, // Belum ada
            'tokopedia_store_name' => null,
            'is_tokopedia_active' => false,

            // Google Maps
            'maps_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127094.6!2d140.4!3d-8.5!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMzAnMDAuMCJTIDE0MMKwMjQnMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890',
            'is_maps_active' => true,
        ]);
    }
}
