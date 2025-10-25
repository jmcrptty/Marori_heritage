<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutSection::create([
            'badge' => 'Tentang Kami',
            'title' => 'Warisan Budaya Marori Wasur',
            'subtitle' => 'Mengenal lebih dekat kehidupan dan tradisi masyarakat adat Papua',
            'who_title' => 'Siapa Kami?',
            'who_paragraph1' => 'Suku Marori adalah salah satu suku asli Papua yang mendiami wilayah Taman Nasional Wasur, Merauke. Kami adalah komunitas yang telah menjaga tradisi leluhur selama ratusan tahun, hidup harmonis dengan alam.',
            'who_paragraph2' => 'Melalui platform ini, kami ingin memperkenalkan kekayaan budaya kami kepada dunia, sekaligus memberdayakan ekonomi masyarakat melalui penjualan produk kerajinan asli Papua.',
            'vision_title' => 'Visi & Misi',
            'vision_text' => 'Melestarikan warisan budaya Suku Marori untuk generasi mendatang sambil meningkatkan kesejahteraan masyarakat adat.',
            'mission_text' => 'Memperkenalkan kebudayaan Marori ke dunia, memberdayakan ekonomi lokal melalui kerajinan tangan, dan menjaga kelestarian alam Wasur.',
            'stat1_number' => '1000+',
            'stat1_label' => 'Tahun Sejarah',
            'stat2_number' => '500+',
            'stat2_label' => 'Keluarga',
            'stat3_number' => '50+',
            'stat3_label' => 'Pengrajin',
            'about_image' => null,
        ]);
    }
}
