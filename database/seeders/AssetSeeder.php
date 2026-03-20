<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assets = [
            [
                'name' => 'HP Laptop ProBook 450',
                'serial_number' => 'HP450-2024-001',
                'status' => 'available'
            ],
            [
                'name' => 'Dell Monitor 24"',
                'serial_number' => 'DELL24-2024-002',
                'status' => 'assigned'
            ],
            [
                'name' => 'Logitech Wireless Mouse',
                'serial_number' => 'LOG-MS-003',
                'status' => 'available'
            ],
            [
                'name' => 'MacBook Air M2',
                'serial_number' => 'MBA-M2-004',
                'status' => 'assigned'
            ],
            [
                'name' => 'Office Chair Ergonomic',
                'serial_number' => 'CHAIR-ERG-005',
                'status' => 'available'
            ],
            [
                'name' => 'iPhone 15 Pro',
                'serial_number' => 'IP15P-006',
                'status' => 'maintenance'
            ],
            [
                'name' => 'Samsung 32" Monitor',
                'serial_number' => 'SAM32-007',
                'status' => 'available'
            ],
            [
                'name' => 'Mechanical Keyboard RGB',
                'serial_number' => 'KB-MECH-008',
                'status' => 'assigned'
            ],
            [
                'name' => 'Webcam HD 1080p',
                'serial_number' => 'WEB-HD-009',
                'status' => 'retired'
            ],
            [
                'name' => 'Desk Lamp LED',
                'serial_number' => 'LAMP-LED-010',
                'status' => 'available'
            ]
        ];

        foreach ($assets as $asset) {
            Asset::firstOrCreate($asset);
        }
    }
}
