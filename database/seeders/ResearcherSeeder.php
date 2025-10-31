<?php

namespace Database\Seeders;

use App\Models\Researcher;
use Illuminate\Database\Seeder;

class ResearcherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $researchers = [
            [
                'name' => 'Dr. John Doe',
                'role' => 'Antropolog',
                'institution' => 'Universitas Papua',
                'photo' => null,
                'order' => 1,
            ],
            [
                'name' => 'Prof. Jane Smith',
                'role' => 'Etnografer',
                'institution' => 'Institut Penelitian Budaya',
                'photo' => null,
                'order' => 2,
            ],
            [
                'name' => 'Michael Johnson',
                'role' => 'Peneliti Lapangan',
                'institution' => 'Lembaga Studi Papua',
                'photo' => null,
                'order' => 3,
            ],
            [
                'name' => 'Sarah Williams',
                'role' => 'Dokumentator',
                'institution' => 'Pusat Dokumentasi Budaya',
                'photo' => null,
                'order' => 4,
            ],
            [
                'name' => 'Dr. Ahmad Yusuf',
                'role' => 'Linguistik',
                'institution' => 'Universitas Indonesia',
                'photo' => null,
                'order' => 5,
            ],
            [
                'name' => 'Lisa Anderson',
                'role' => 'Arkeolog',
                'institution' => 'Institut Arkeologi Papua',
                'photo' => null,
                'order' => 6,
            ],
        ];

        foreach ($researchers as $researcher) {
            Researcher::create($researcher);
        }
    }
}
