<?php

namespace Database\Seeders;

use App\Models\GalleryVideo;
use App\Models\GalleryPhoto;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Gallery Video
        GalleryVideo::create([
            'title' => 'Kehidupan Suku Marori di Taman Nasional Wasur',
            'description' => 'Dokumenter tentang kehidupan sehari-hari masyarakat Suku Marori dan bagaimana mereka menjaga kelestarian hutan Wasur.',
            'youtube_id' => 'KpCwki0hWDQ',
            'youtube_url' => 'https://www.youtube.com/watch?v=KpCwki0hWDQ',
            'views' => '12.5K views',
            'upload_date' => '2 bulan lalu',
            'is_featured' => true,
            'order' => 1,
            'is_active' => true,
        ]);

        // Seed Gallery Photos
        $photos = [
            [
                'title' => 'Rumah Adat Marori',
                'caption' => 'Arsitektur tradisional dengan bahan alami',
                'image_path' => 'gallery/rumah-adat.jpg',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Kerajinan Tangan',
                'caption' => 'Proses pembuatan noken dan ukiran',
                'image_path' => 'gallery/kerajinan.jpg',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Tarian Tradisional',
                'caption' => 'Pertunjukan tari perang khas Marori',
                'image_path' => 'gallery/tarian.jpg',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Pakaian Adat',
                'caption' => 'Koteka dan aksesoris tradisional',
                'image_path' => 'gallery/pakaian.jpg',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Alam Wasur',
                'caption' => 'Keindahan savana dan hutan Papua',
                'image_path' => 'gallery/alam.jpg',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Masyarakat Marori',
                'caption' => 'Kehidupan sehari-hari di kampung',
                'image_path' => 'gallery/masyarakat.jpg',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($photos as $photo) {
            GalleryPhoto::create($photo);
        }
    }
}
