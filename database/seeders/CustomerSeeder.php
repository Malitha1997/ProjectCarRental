<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'customer_name' => 'ABC Perera',
            'contact_number' => '0711234567',
            'customer_email' => 'perera@gmail.com',
            'postal_address' => 'Hidellana,Ratnapura'
        ]);

        DB::table('customers')->insert([
            'customer_name' => 'DEF Fernando',
            'contact_number' => '0771234568',
            'customer_email' => 'fernando@gmail.com',
            'postal_address' => 'Dickwella,Matara'
        ]);

        DB::table('customers')->insert([
            'customer_name' => 'LKM Peris',
            'contact_number' => '0751234581',
            'customer_email' => 'peris@gmail.com',
            'postal_address' => 'Harangala,Nawalapitiya'
        ]);
    }
}
