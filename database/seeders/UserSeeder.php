<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('1234567890'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'user',
            'password' => bcrypt('1234567890'),
            'role' => 'user',
        ]);
    }
}