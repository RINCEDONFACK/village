<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'tel1',
                'tel1' => '+237 233 XX XX XX',
                'value' => '+237 233 XX XX XX',
            ],
            [
                'key' => 'email',
                'email' => 'contact@votresite.cm',
                'value' => 'contact@votresite.cm',
            ],
            [
                'key' => 'adresse',
                'adresse' => 'Dschang, Ouest, Cameroun',
                'value' => 'Dschang, Ouest, Cameroun',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
