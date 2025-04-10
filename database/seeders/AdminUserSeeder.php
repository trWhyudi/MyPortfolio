<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'role' => 1,
            'image' => 'default-profile.png',
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'is_verified' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}