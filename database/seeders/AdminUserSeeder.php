<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'internationalhousef@gmail.com'],
            [
                'name' => 'Admin',
                'email' => 'internationalhousef@gmail.com',
                'password' => Hash::make('internationalhousef'),
                'phone' => '000000000',
                'photo' => null,
                'address' => 'HQ',
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
