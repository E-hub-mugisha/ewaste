<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('partners')->insert([
            [
                'name' => 'GreenTech Recycling Center',
                'email' => 'contact@greentech.com',
                'phone' => '+250788123456',
                'address' => 'Kigali, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'EcoWaste Solutions',
                'email' => 'info@ecowaste.rw',
                'phone' => '+250789654321',
                'address' => 'Huye, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'RecycleHub Ltd.',
                'email' => 'support@recyclehub.com',
                'phone' => '+250787998877',
                'address' => 'Rubavu, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
