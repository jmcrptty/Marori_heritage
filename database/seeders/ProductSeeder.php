<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Noken Papua',
                'category' => 'Kerajinan Tangan',
                'description' => 'Tas anyaman tradisional Papua yang multifungsi, dibuat dengan teknik turun-temurun.',
                'price' => 250000.00,
                'price_display' => 'Rp 250.000',
                'image' => null,
                'marketplace_link' => 'https://tokopedia.com/noken-papua',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Ukiran Kayu Asmat',
                'category' => 'Seni & Kerajinan',
                'description' => 'Ukiran kayu dengan motif khas Papua, karya pengrajin lokal berpengalaman.',
                'price' => 500000.00,
                'price_display' => 'Rp 500.000',
                'image' => null,
                'marketplace_link' => 'https://tokopedia.com/ukiran-asmat',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Sagu Tradisional',
                'category' => 'Makanan',
                'description' => 'Tepung sagu murni hasil olahan tradisional, sumber karbohidrat sehat khas Papua.',
                'price' => 75000.00,
                'price_display' => 'Rp 75.000',
                'image' => null,
                'marketplace_link' => 'https://tokopedia.com/sagu-papua',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Gelang Manik-manik',
                'category' => 'Aksesoris',
                'description' => 'Gelang tradisional dengan manik-manik warna-warni, simbol keindahan budaya Papua.',
                'price' => 150000.00,
                'price_display' => 'Rp 150.000',
                'image' => null,
                'marketplace_link' => 'https://tokopedia.com/gelang-papua',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Lukisan Kulit Kayu',
                'category' => 'Seni',
                'description' => 'Lukisan dengan media kulit kayu, menggambarkan kehidupan masyarakat Papua.',
                'price' => 350000.00,
                'price_display' => 'Rp 350.000',
                'image' => null,
                'marketplace_link' => 'https://tokopedia.com/lukisan-papua',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Minyak Buah Merah',
                'category' => 'Kesehatan',
                'description' => 'Minyak buah merah asli Papua yang kaya manfaat untuk kesehatan.',
                'price' => 200000.00,
                'price_display' => 'Rp 200.000',
                'image' => null,
                'marketplace_link' => 'https://tokopedia.com/buah-merah',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
