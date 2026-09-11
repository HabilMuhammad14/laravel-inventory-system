<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Habil Muhammad',
            'email' => 'habil@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => 'pemilik',
        ]);
    }
}