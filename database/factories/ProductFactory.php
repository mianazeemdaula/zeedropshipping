<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 12),
            'user_id' => 1,
            'name' => $this->faker->word,
            'sku' => rand(100000, 999999),
            'purchase_price' => $this->faker->randomFloat(2, 1, 1000),
            'sale_price' => $this->faker->randomFloat(2, 1, 1000),
            'discount_price' => $this->faker->randomFloat(2, 1, 1000),
            'description' => $this->faker->text,
            'vat' => $this->faker->randomFloat(2, 1, 10),
            'stock' => $this->faker->numberBetween(1, 100),
            'low_stock_report' => $this->faker->numberBetween(5, 10),
            'min_order_qty' => $this->faker->numberBetween(1, 5),
            'max_order_qty' => $this->faker->numberBetween(5, 20),
            'weight' => $this->faker->numberBetween(1, 100),
            'image' => $this->faker->imageUrl(),
            'other_details' => $this->faker->text,
            'status' => 1,
        ];
    }
}
