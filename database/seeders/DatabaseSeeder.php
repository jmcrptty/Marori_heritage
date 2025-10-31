<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed all content sections
        $this->call([
            UserSeeder::class,
            HeroSectionSeeder::class,
            AboutSectionSeeder::class,
            CultureItemSeeder::class,
            ProductSeeder::class,
            ContactInfoSeeder::class,
            GallerySeeder::class,
            ResearcherSeeder::class,
        ]);
    }
}
