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
                'name' => 'Noken Marori',
                'category' => 'Kerajinan Tangan',
                'description' => 'Tas rajutan tradisional dari serat kulit kayu yang dibuat dengan teknik warisan leluhur masyarakat Marori.',
                'price' => 'Rp 250.000 - Rp 500.000',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/noken-marori',
                'tokopedia_link' => 'https://tokopedia.com/noken-marori',
            ],
            [
                'name' => 'Ukiran Kayu Merbau',
                'category' => 'Kerajinan Tangan',
                'description' => 'Patung dan ukiran dari kayu merbau khas Papua dengan motif tradisional Marori yang indah dan unik.',
                'price' => 'Rp 350.000 - Rp 2.000.000',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/ukiran-merbau',
                'tokopedia_link' => 'https://tokopedia.com/ukiran-merbau',
            ],
            [
                'name' => 'Sagu Wasur Organik',
                'category' => 'Makanan',
                'description' => 'Tepung sagu murni 100% organik hasil panen dari hutan Wasur, diolah secara tradisional tanpa bahan kimia.',
                'price' => 'Rp 45.000 / kg',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/sagu-wasur',
                'tokopedia_link' => 'https://tokopedia.com/sagu-wasur',
            ],
            [
                'name' => 'Gelang Kulit Rusa',
                'category' => 'Aksesoris',
                'description' => 'Gelang handmade dari kulit rusa asli dengan ukiran motif khas Marori yang elegan dan tahan lama.',
                'price' => 'Rp 75.000 - Rp 150.000',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/gelang-kulit',
                'tokopedia_link' => 'https://tokopedia.com/gelang-kulit',
            ],
            [
                'name' => 'Lukisan Kulit Kayu',
                'category' => 'Kerajinan Tangan',
                'description' => 'Lukisan motif tradisional di atas kulit kayu dengan pewarna alami dari hutan Wasur yang ramah lingkungan.',
                'price' => 'Rp 200.000 - Rp 800.000',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/lukisan-kulit-kayu',
                'tokopedia_link' => 'https://tokopedia.com/lukisan-kulit-kayu',
            ],
            [
                'name' => 'Minyak Buah Merah',
                'category' => 'Kesehatan',
                'description' => 'Minyak buah merah asli Papua dengan khasiat tinggi untuk kesehatan, kaya antioksidan dan vitamin.',
                'price' => 'Rp 150.000 / 100ml',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/minyak-buah-merah',
                'tokopedia_link' => 'https://tokopedia.com/minyak-buah-merah',
            ],
            [
                'name' => 'Paket Suvenir Papua',
                'category' => 'Kerajinan Tangan',
                'description' => 'Paket lengkap souvenir khas Papua untuk oleh-oleh atau hadiah istimewa berisi berbagai produk pilihan.',
                'price' => 'Rp 300.000 - Rp 1.000.000',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/paket-suvenir',
                'tokopedia_link' => 'https://tokopedia.com/paket-suvenir',
            ],
            [
                'name' => 'Topi Sali',
                'category' => 'Kerajinan Tangan',
                'description' => 'Topi tradisional dari daun sagu yang dianyam dengan teknik khas Marori, cocok untuk aktivitas outdoor.',
                'price' => 'Rp 100.000 - Rp 200.000',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/topi-sali',
                'tokopedia_link' => 'https://tokopedia.com/topi-sali',
            ],
            [
                'name' => 'Tifa Papua',
                'category' => 'Kerajinan Tangan',
                'description' => 'Alat musik tradisional Papua berupa gendang dengan ukiran khas Marori yang indah dan autentik.',
                'price' => 'Rp 400.000 - Rp 1.500.000',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/tifa-papua',
                'tokopedia_link' => 'https://tokopedia.com/tifa-papua',
            ],
            [
                'name' => 'Perhiasan Kerang',
                'category' => 'Aksesoris',
                'description' => 'Kalung dan gelang dari kerang laut dengan motif tradisional Papua yang cantik dan natural.',
                'price' => 'Rp 50.000 - Rp 150.000',
                'image' => null,
                'shopee_link' => 'https://shopee.co.id/perhiasan-kerang',
                'tokopedia_link' => 'https://tokopedia.com/perhiasan-kerang',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
