<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@techdomain.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Editor User
        User::create([
            'name' => 'Editor User',
            'email' => 'editor@techdomain.com',
            'password' => Hash::make('password'),
            'role' => 'editor',
        ]);
    }
}
