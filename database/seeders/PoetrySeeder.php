<?php

namespace Database\Seeders;

use App\Models\Poetry;
use Illuminate\Database\Seeder;

class PoetrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $poetries = [
            [
                'title' => 'Tanah Leluhur',
                'content' => "Marori ahue, tanah kemuliaan
Wasur megah, hutan kehidupan
Leluhur kami berjalan di sini
Jejak mereka abadi di bumi

Rusa berlari di padang luas
Burung bernyanyi di pohon tinggi
Ini warisan yang kami jaga
Untuk anak cucu selamanya",
                'translation' => "Marori kami, tanah kemuliaan
Wasur yang megah, hutan kehidupan
Leluhur kami berjalan di sini
Jejak mereka abadi di bumi

Rusa berlari di padang luas
Burung bernyanyi di pohon tinggi
Ini warisan yang kami jaga
Untuk anak cucu selamanya",
                'audio_file' => null,
                'author' => 'Tetua Suku Marori',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Kebijaksanaan Nenek Moyang',
                'content' => "Kata nenek moyang kami
Jaga alam, alam jaga kita
Ambil secukupnya dari hutan
Sisakan untuk masa depan

Air mengalir, hidup mengalir
Pohon berdiri, kita berdiri
Harmoni dengan alam
Itulah jalan hidup kami",
                'translation' => "Kata nenek moyang kami
Jaga alam, alam menjaga kita
Ambil secukupnya dari hutan
Sisakan untuk masa depan

Air mengalir, hidup mengalir
Pohon berdiri, kita berdiri
Harmoni dengan alam
Itulah jalan hidup kami",
                'audio_file' => null,
                'author' => 'Pemuka Adat Marori',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Lagu Pemburu',
                'content' => "Fajar menyingsing di Wasur
Kami melangkah dengan busur
Mengikuti jejak rusa liar
Berburu untuk keluarga tercinta

Hutan berbisik memberi petunjuk
Angin membawa aroma mangsa
Kami berterima kasih pada alam
Sebelum melepaskan anak panah",
                'translation' => "Fajar menyingsing di Wasur
Kami melangkah dengan busur
Mengikuti jejak rusa liar
Berburu untuk keluarga tercinta

Hutan berbisik memberi petunjuk
Angin membawa aroma mangsa
Kami berterima kasih pada alam
Sebelum melepaskan anak panah",
                'audio_file' => null,
                'author' => 'Pemburu Marori',
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($poetries as $poetry) {
            Poetry::create($poetry);
        }
    }
}
