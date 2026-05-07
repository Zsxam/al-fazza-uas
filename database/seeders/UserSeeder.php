<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Admin Utama
        User::create([
            'name' => 'Admin Al-Fazza',
            'email' => 'adminalfazza@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // 2. Akun Kasir Toko
        User::create([
            'name' => 'Kasir Al-Fazza',
            'email' => 'kasiralfazza@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'kasir',
        ]);
    }
}
