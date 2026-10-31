<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['username' => 'msantos',     'full_name' => 'Maria Santos'],
            ['username' => 'jdelacruz',   'full_name' => 'Juan Dela Cruz'],
            ['username' => 'areyes',      'full_name' => 'Ana Reyes'],
            ['username' => 'cmendoza',    'full_name' => 'Carlo Mendoza'],
            ['username' => 'lvillanueva', 'full_name' => 'Liza Villanueva'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}