<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            'vehicle_name' => 'Car 001',
            'rental_per_day' => '1200',
            'user_id' => 1,
        ]);

        DB::table('vehicles')->insert([
            'vehicle_name' => 'Car 002',
            'rental_per_day' => '1500',
            'user_id' => 1,
        ]);

        DB::table('vehicles')->insert([
            'vehicle_name' => 'Car 003',
            'rental_per_day' => '1200',
            'user_id' => 1,
        ]);

        DB::table('vehicles')->insert([
            'vehicle_name' => 'Car 004',
            'rental_per_day' => '1500',
            'user_id' => 1,
        ]);

        DB::table('vehicles')->insert([
            'vehicle_name' => 'Car 005',
            'rental_per_day' => '1200',
            'user_id' => 1,
        ]);

        DB::table('vehicles')->insert([
            'vehicle_name' => 'Car 006',
            'rental_per_day' => '1500',
            'user_id' => 1,
        ]);
    }
}
