<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['full_name' => 'Doge Shiba',        'email' => 'doge.shiba@example.com',     'phone' => '09171234567'],
            ['full_name' => 'Big Chungus',       'email' => 'big.chungus@example.com',    'phone' => '09181234567'],
            ['full_name' => 'Bongo Cat',         'email' => 'bongo.cat@example.com',      'phone' => '09191234567'],
            ['full_name' => 'Juan Tamad',        'email' => 'juan.tamad@example.com',     'phone' => '09201234567'],
            ['full_name' => 'Pedro Penduko',     'email' => 'pedro.penduko@example.com',  'phone' => '09211234567'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}