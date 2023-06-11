<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            'pickup_date' => '03/10/2015',
            'dropoff_date' => '03/12/2015',
            'total_amount' => '2400',
            'vehicle_id' => 1,
            'customer_id' => 1
        ]);

        DB::table('bookings')->insert([
            'pickup_date' => '03/13/2015',
            'dropoff_date' => '03/14/2015',
            'total_amount' => '1500',
            'vehicle_id' => 2,
            'customer_id' => 2
        ]);

        DB::table('bookings')->insert([
            'pickup_date' => '03/12/2015',
            'dropoff_date' => '03/15/2015',
            'total_amount' => '3600',
            'vehicle_id' => 3,
            'customer_id' => 3
        ]);

    }
}
