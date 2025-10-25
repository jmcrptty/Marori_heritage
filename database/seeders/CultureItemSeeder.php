<?php

namespace Database\Seeders;

use App\Models\CultureItem;
use Illuminate\Database\Seeder;

class CultureItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cultureItems = [
            [
                'title' => 'Tari Kreasi',
                'category' => 'Kesenian',
                'description' => 'Tarian tradisional yang menggambarkan kehidupan sehari-hari masyarakat Marori dengan gerakan yang dinamis dan penuh makna.',
                'image' => null,
            ],
            [
                'title' => 'Tari Manimbong',
                'category' => 'Kesenian',
                'description' => 'Tarian upacara adat yang dilakukan dalam berbagai perayaan penting masyarakat Marori.',
                'image' => null,
            ],
            [
                'title' => 'Ma\'badong',
                'category' => 'Budaya',
                'description' => 'Upacara adat tradisional yang merupakan warisan leluhur masyarakat Marori.',
                'image' => null,
            ],
            [
                'title' => 'Baka/Nase',
                'category' => 'Budaya',
                'description' => 'Kearifan lokal dan filosofi hidup masyarakat Marori yang diturunkan dari generasi ke generasi.',
                'image' => null,
            ],
            [
                'title' => 'Rumah Adat Marori',
                'category' => 'Arsitektur',
                'description' => 'Rumah adat yang dibangun dengan bahan alami dari hutan Wasur dengan arsitektur khas Papua.',
                'image' => null,
            ],
            [
                'title' => 'Pakaian Adat',
                'category' => 'Tradisi',
                'description' => 'Pakaian tradisional yang terbuat dari bahan alami seperti kulit kayu dan rotan dengan hiasan khas Papua.',
                'image' => null,
            ],
            [
                'title' => 'Senjata Tradisional',
                'category' => 'Warisan',
                'description' => 'Busur dan anak panah tradisional yang menjadi senjata utama untuk berburu di hutan Wasur.',
                'image' => null,
            ],
            [
                'title' => 'Upacara Adat',
                'category' => 'Ritual',
                'description' => 'Upacara adat yang dilakukan untuk peristiwa penting seperti pernikahan, panen, dan penghormatan kepada leluhur.',
                'image' => null,
            ],
        ];

        foreach ($cultureItems as $item) {
            CultureItem::create($item);
        }
    }
}
