<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingTableSeeder extends Seeder
{
    public function run()
    {
        $pricings = [
            // Partner 1
            ['partner_id' => 1, 'device_type' => 'Smartphone', 'price' => 5000, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],
            ['partner_id' => 1, 'device_type' => 'Laptop', 'price' => 15000, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],
            ['partner_id' => 1, 'device_type' => 'Tablet', 'price' => 8000, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],

            // Partner 2
            ['partner_id' => 2, 'device_type' => 'Smartphone', 'price' => 5500, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],
            ['partner_id' => 2, 'device_type' => 'Laptop', 'price' => 16000, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],
            ['partner_id' => 2, 'device_type' => 'Desktop PC', 'price' => 20000, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],

            // Partner 3
            ['partner_id' => 3, 'device_type' => 'Smartphone', 'price' => 5200, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],
            ['partner_id' => 3, 'device_type' => 'Laptop', 'price' => 15500, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],
            ['partner_id' => 3, 'device_type' => 'Tablet', 'price' => 8200, 'currency' => 'RWF', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('pricings')->insert($pricings);
    }
}
