<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Category;
use App\Models\Shipper;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'support']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'vendor']);
        Role::create(['name' => 'dispatcher']);
        Role::create(['name' => 'shipper']);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $user = User::find(1);
        $user->assignRole('admin');

        User::factory()->create([
            'name' => 'Vendor',
            'email' => 'vendor@gmail.com',
        ]);

        $user = User::find(2);
        $user->assignRole('vendor');


        User::factory()->create([
            'name' => 'Dispatcher',
            'email' => 'dispatcher@gmail.com',
        ]);

        $user = User::find(3);
        $user->assignRole('dispatcher');


        // add countries and states
        Country::create(['name' => 'Pakistan', 'iso2' => 'PK', 'iso3' => 'PAK', 'phone_code' => '+92', 'currency' => 'PKR', 'currency_symbol' => 'Rs']);
        Country::create(['name' => 'United States', 'iso2' => 'US', 'iso3' => 'USA', 'phone_code' => '+1', 'currency' => 'USD', 'currency_symbol' => '$']);

        // Add states

        State::create(['country_id' => 1, 'name' => 'Punjab']);
        State::create(['country_id' => 1, 'name' => 'Sindh']);
        State::create(['country_id' => 1, 'name' => 'KPK']);
        State::create(['country_id' => 1, 'name' => 'Balochistan']);
        State::create(['country_id' => 1, 'name' => 'GB']);

        // Add Some Cities

        City::create(['state_id' => 1, 'name' => 'Lahore', 'delivery_fee' => 100]);
        City::create(['state_id' => 1, 'name' => 'Faisalabad', 'delivery_fee' => 150]);
        City::create(['state_id' => 1, 'name' => 'Multan', 'delivery_fee' => 200]);
        City::create(['state_id' => 1, 'name' => 'Rawalpindi', 'delivery_fee' => 250]);
        City::create(['state_id' => 1, 'name' => 'Gujranwala', 'delivery_fee' => 300]);

        // Categories 

        $categories = [
            'Electronics',
            'Fashion',
            'Home & Living',
            'Health & Beauty',
            'Sports & Travel',
            'Automotive',
            'Books & Stationery',
            'Groceries',
            'Kids & Babies',
            'Pets',
            'Services',
            'Others',
        ];
        Category::insert(array_map(fn($category) => ['name' => $category], $categories));

        // Paymnet Methods 
        foreach (['Cash on Delivery', 'Credit Card', 'Bank Transfer'] as $method) {
            \App\Models\PaymentMethod::create(['name' => $method,'slug' => \Illuminate\Support\Str::slug($method)]);
        }

        // Products
        // \App\Models\Product::factory(5)->create();
        \App\Models\Product::create([
            'category_id' => 1,
            'user_id' => 2,
            'name' => 'iPhone 12',
            'sku' => 'SKU-240811-01',
            'purchase_price' => 1000,
            'sale_price' => 1200,
            'discount_price' => 1100,
            'description' => 'This is a test product',
            'vat' => 10,
            'stock' => 100,
            'low_stock_report' => 10,
            'min_order_qty' => 1,
            'max_order_qty' => 5,
            'weight' => 1,
            'image' => 'https://via.placeholder.com/150',
            'other_details' => 'This is a test product',
            'status' => 1,
        ]);
        Shipper::create([
            'name' => 'Digi Dokan',
            'phone' => '123456789',
            'email' => 'digidokan@gmail.com',
            'slug' => 'digidokan',
            'tracking_url' => 'https://tcs.com/track',
            'icon' => 'https://web.digidokaan.pk/images/dokaan_logo.png',
            'active' => true,
            'config' => json_encode([
                'phone' => '923123456789',
                'password' => '12345678',
                'token' => '',
            ]),
        ]);
    }
}
