<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorRevenue;

class RevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VendorRevenue::create([
            'order_id' => 1,
            'user_id' => 2,
            'amount' => 100,
            'status' => 'paid',
            'paid_at' => now(),
            'description' => 'Order #1 revenue',
        ]);

        VendorRevenue::create([
            'order_id' => 2,
            'user_id' => 2,
            'amount' => 200,
            'status' => 'paid',
            'paid_at' => now(),
            'description' => 'Order #2 revenue',
        ]);
    }
}
