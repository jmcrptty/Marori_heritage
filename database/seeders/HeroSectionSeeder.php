<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'badge' => 'Papua Heritage',
                'title' => 'Suku Marori Wasur',
                'subtitle' => 'Melestarikan Budaya, Memberdayakan Ekonomi',
                'description' => 'Warisan leluhur dari hutan Wasur untuk Indonesia. Bergabunglah dalam perjalanan kami menjaga tradisi dan memberdayakan masyarakat adat Papua.',
                'btn_primary_text' => 'Jelajahi Produk',
                'btn_primary_link' => '#produk',
                'btn_secondary_text' => 'Kenali Kami',
                'btn_secondary_link' => '#tentang',
                'background_image' => null,
                'enable_video_background' => false,
                'video_youtube_id' => null,
            ]
        );
    }
}
