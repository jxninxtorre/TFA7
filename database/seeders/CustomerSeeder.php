<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            ['full_name' => 'Maria Santos',    'email' => 'maria.santos@example.com',    'phone' => '09171234567'],
            ['full_name' => 'Juan Dela Cruz',  'email' => 'juan.delacruz@example.com',   'phone' => '09181234567'],
            ['full_name' => 'Ana Reyes',       'email' => 'ana.reyes@example.com',       'phone' => '09191234567'],
            ['full_name' => 'Carlo Mendoza',   'email' => 'carlo.mendoza@example.com',   'phone' => '09201234567'],
            ['full_name' => 'Liza Villanueva', 'email' => 'liza.villanueva@example.com', 'phone' => '09211234567'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}