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
        // Seed Gallery Videos
        $videos = [
            [
                'title' => 'Kehidupan Suku Marori di Taman Nasional Wasur',
                'description' => 'Dokumenter lengkap tentang kehidupan sehari-hari masyarakat Suku Marori dan bagaimana mereka menjaga kelestarian hutan Wasur dengan kearifan lokal turun-temurun.',
                'youtube_id' => 'KpCwki0hWDQ',
                'youtube_url' => 'https://www.youtube.com/watch?v=KpCwki0hWDQ',
                'views' => '12.5K views',
                'upload_date' => '2 bulan lalu',
                'is_featured' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Tarian dan Ritual Tradisional Marori',
                'description' => 'Saksikan tarian perang dan ritual adat yang masih dilestarikan oleh masyarakat Marori hingga saat ini. Pertunjukan yang memukau dengan kostum tradisional.',
                'youtube_id' => 'dQw4w9WgXcQ',
                'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'views' => '8.2K views',
                'upload_date' => '3 minggu lalu',
                'is_featured' => false,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Proses Pembuatan Noken Tradisional',
                'description' => 'Ikuti proses pembuatan noken, tas tradisional khas Papua yang dibuat dengan teknik turun-temurun menggunakan serat kulit kayu alami.',
                'youtube_id' => 'jNQXAC9IVRw',
                'youtube_url' => 'https://www.youtube.com/watch?v=jNQXAC9IVRw',
                'views' => '5.7K views',
                'upload_date' => '1 bulan lalu',
                'is_featured' => false,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Keindahan Taman Nasional Wasur',
                'description' => 'Jelajahi keindahan savana, hutan, dan satwa liar di Taman Nasional Wasur, habitat asli Suku Marori yang masih sangat alami dan terjaga.',
                'youtube_id' => '9bZkp7q19f0',
                'youtube_url' => 'https://www.youtube.com/watch?v=9bZkp7q19f0',
                'views' => '15.3K views',
                'upload_date' => '3 bulan lalu',
                'is_featured' => false,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Upacara Adat Suku Marori',
                'description' => 'Dokumentasi upacara adat penting dalam kehidupan masyarakat Marori yang menunjukkan kekayaan budaya dan spiritual mereka.',
                'youtube_id' => 'M7lc1UVf-VE',
                'youtube_url' => 'https://www.youtube.com/watch?v=M7lc1UVf-VE',
                'views' => '6.1K views',
                'upload_date' => '2 minggu lalu',
                'is_featured' => false,
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($videos as $video) {
            GalleryVideo::create($video);
        }

        // Seed Gallery Photos
        $photos = [
            [
                'title' => 'Tarian Tradisional Marori',
                'caption' => 'Pertunjukan tarian perang khas Suku Marori dengan kostum dan aksesoris tradisional yang memukau.',
                'image_path' => null, // Will be uploaded via dashboard
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Savana Taman Nasional Wasur',
                'caption' => 'Keindahan savana yang luas di Taman Nasional Wasur, habitat asli Suku Marori yang masih alami.',
                'image_path' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Kerajinan Noken Papua',
                'caption' => 'Tas tradisional noken hasil karya tangan masyarakat Marori dengan teknik anyaman turun-temurun.',
                'image_path' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Matahari Terbenam di Wasur',
                'caption' => 'Pemandangan sunset yang menakjubkan di savana Wasur, momen keindahan alam Papua yang langka.',
                'image_path' => null,
                'order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Rumah Adat Marori',
                'caption' => 'Arsitektur tradisional rumah adat Suku Marori yang dibangun dengan bahan alami dari hutan.',
                'image_path' => null,
                'order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Ritual Adat Suku Marori',
                'caption' => 'Pelaksanaan upacara adat yang masih dilestarikan oleh masyarakat Marori hingga saat ini.',
                'image_path' => null,
                'order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Hutan Tropis Papua',
                'caption' => 'Keanekaragaman hayati hutan tropis Papua yang menjadi rumah bagi Suku Marori.',
                'image_path' => null,
                'order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Senjata Tradisional Marori',
                'caption' => 'Koleksi busur, panah, dan tombak tradisional yang digunakan untuk berburu oleh masyarakat Marori.',
                'image_path' => null,
                'order' => 8,
                'is_active' => true,
            ],
            [
                'title' => 'Kehidupan Bersama Alam',
                'caption' => 'Harmoni kehidupan masyarakat Marori dengan alam sekitar yang mencerminkan kearifan lokal.',
                'image_path' => null,
                'order' => 9,
                'is_active' => true,
            ],
        ];

        foreach ($photos as $photo) {
            GalleryPhoto::create($photo);
        }
    }
}
