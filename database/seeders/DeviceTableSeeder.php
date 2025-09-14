<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DeviceTableSeeder extends Seeder
{
    public function run()
    {
        $devices = [
            [
                'user_id' => 1,
                'device_name' => 'iPhone 14',
                'brand' => 'Apple',
                'type' => 'Smartphone',
                'condition' => 'Good',
                'quantity' => 1,
                'photo' => 'devices/iphone14.jpg',
                'pickup_address' => 'Kigali, Nyarutarama, House #12',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Submitted',
            ],
            [
                'user_id' => 2,
                'device_name' => 'Galaxy S23',
                'brand' => 'Samsung',
                'type' => 'Smartphone',
                'condition' => 'Fair',
                'quantity' => 1,
                'photo' => 'devices/galaxy_s23.jpg',
                'pickup_address' => 'Kigali, Kimihurura, House #45',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Submitted',
            ],
            [
                'user_id' => 3,
                'device_name' => 'Dell XPS 13',
                'brand' => 'Dell',
                'type' => 'Laptop',
                'condition' => 'Good',
                'quantity' => 1,
                'photo' => 'devices/dell_xps13.jpg',
                'pickup_address' => 'Kigali, Kacyiru, House #21',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Collected',
            ],
            [
                'user_id' => 1,
                'device_name' => 'MacBook Pro 16"',
                'brand' => 'Apple',
                'type' => 'Laptop',
                'condition' => 'New',
                'quantity' => 1,
                'photo' => 'devices/macbook_pro.jpg',
                'pickup_address' => 'Kigali, Remera, House #78',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Transferred',
            ],
            [
                'user_id' => 2,
                'device_name' => 'iPad Air',
                'brand' => 'Apple',
                'type' => 'Tablet',
                'condition' => 'Good',
                'quantity' => 1,
                'photo' => 'devices/ipad_air.jpg',
                'pickup_address' => 'Kigali, Nyarutarama, House #34',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Recycled',
            ],
            [
                'user_id' => 3,
                'device_name' => 'HP Pavilion',
                'brand' => 'HP',
                'type' => 'Laptop',
                'condition' => 'Fair',
                'quantity' => 1,
                'photo' => 'devices/hp_pavilion.jpg',
                'pickup_address' => 'Kigali, Kicukiro, House #56',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Submitted',
            ],
            [
                'user_id' => 1,
                'device_name' => 'Lenovo ThinkPad X1',
                'brand' => 'Lenovo',
                'type' => 'Laptop',
                'condition' => 'Good',
                'quantity' => 1,
                'photo' => 'devices/thinkpad_x1.jpg',
                'pickup_address' => 'Kigali, Gisozi, House #12',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Collected',
            ],
            [
                'user_id' => 2,
                'device_name' => 'Google Pixel 7',
                'brand' => 'Google',
                'type' => 'Smartphone',
                'condition' => 'Good',
                'quantity' => 1,
                'photo' => 'devices/pixel7.jpg',
                'pickup_address' => 'Kigali, Kacyiru, House #88',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Submitted',
            ],
            [
                'user_id' => 3,
                'device_name' => 'Sony Xperia 5',
                'brand' => 'Sony',
                'type' => 'Smartphone',
                'condition' => 'Poor',
                'quantity' => 1,
                'photo' => 'devices/xperia5.jpg',
                'pickup_address' => 'Kigali, Kimironko, House #65',
                'tracking_code' => 'TRK-' . strtoupper(Str::random(8)),
                'status' => 'Transferred',
            ],
        ];

        foreach ($devices as $device) {
            DB::table('devices')->insert(array_merge($device, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
