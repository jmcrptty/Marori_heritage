<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInfo::create([
            'whatsapp' => '+62 812-3456-7890',
            'whatsapp_link' => 'https://wa.me/6281234567890',
            'email' => 'info@maroriwasur.com',
            'address' => 'Kampung Wasur, Merauke, Papua Selatan 99600',
            'instagram' => 'https://instagram.com/maroriwasur',
            'facebook' => 'https://facebook.com/maroriwasur',
            'youtube' => 'https://youtube.com/@maroriwasur',
            'weekday_hours' => '09:00 - 17:00 WIT',
            'saturday_hours' => '09:00 - 15:00 WIT',
            'sunday_hours' => 'Tutup',
            'whatsapp_response' => 'Fast Response 24/7',
        ]);
    }
}
