<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['username' => 'sir_doge',      'full_name' => 'Doge Shiba'],
            ['username' => 'chungus_xl',    'full_name' => 'Big Chungus'],
            ['username' => 'bongo_beats',   'full_name' => 'Bongo Cat'],
            ['username' => 'juan_tamad',    'full_name' => 'Juan Tamad'],
            ['username' => 'pedro_pogi',    'full_name' => 'Pedro Penduko'],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}