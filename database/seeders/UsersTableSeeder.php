<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Eric Mugisha',
                'email' => 'eric.mugisha@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'phone' => '+250780123456',
                'address' => 'Kigali, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aline Uwase',
                'email' => 'aline.uwase@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'collector',
                'phone' => '+250788654321',
                'address' => 'Kigali, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jean Bosco',
                'email' => 'jean.bosco@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'user',
                'phone' => '+250789112233',
                'address' => 'Musanze, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sandrine Niyonsaba',
                'email' => 'sandrine.niyonsaba@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'user',
                'phone' => '+250788998877',
                'address' => 'Rubavu, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Patrick Habimana',
                'email' => 'patrick.habimana@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'collector',
                'phone' => '+250782334455',
                'address' => 'Kigali, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Mukamana',
                'email' => 'alice.mukamana@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'user',
                'phone' => '+250787667788',
                'address' => 'Huye, Rwanda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
