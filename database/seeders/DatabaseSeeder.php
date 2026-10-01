<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Akun User Biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // 3. Sample Data Mahasiswa
        Mahasiswa::create([
            'nim' => '220001',
            'nama' => 'Budi Santoso',
            'program_studi' => 'Informatika',
            'email' => 'budi@gmail.com',
            'angkatan' => 2022,
        ]);
    }
}