<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'login' => 'adminka',
            'full_name' => 'Администратор',
            'email' => 'admin@clean.com',
            'phone' => '+7(999)-999-99-99',
            'password' => Hash::make('password'),
        ]);
    }
}