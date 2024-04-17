<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // manual input
        \App\Models\Discount::create([
            'name' => 'Wellcome MSH',
            'description' => 'New member MSH',
            'type' => 'percentage',
            'value' => 20,
            'status' => 'active',
            'expired_date' =>'2025-05-05'
        ]);

        \App\Models\Discount::create([
            'name' => 'New Year',
            'description' => 'Discount New Year',
            'type' => 'percentage',
            'value' => 10,
            'status' => 'active',
            'expired_date' =>'2025-05-07'
        ]);

        \App\Models\Discount::create([
            'name' => 'Black Friday',
            'description' => 'Discount New Year',
            'type' => 'percentage',
            'value' => 15,
            'status' => 'active',
             'expired_date' =>'2025-12-05',
        ]);

    }
}
