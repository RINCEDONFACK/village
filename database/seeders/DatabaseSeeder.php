<?php

namespace Database\Seeders;
use Database\Seeders\SettingsTableSeeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingsTableSeeder::class,
            UserSeeder::class

        ]);
            $this->call(AdminUserSeeder::class);
    }
}
