<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Menggunakan updateOrCreate agar tidak error jika dijalankan 2 kali
        User::updateOrCreate(
            ['email' => 'suprapto@gmail.com'],
            [
                'name' => 'Suprapto Admin',
                'password' => Hash::make('Suprapto230204'), 
            ]
        );
    }
}