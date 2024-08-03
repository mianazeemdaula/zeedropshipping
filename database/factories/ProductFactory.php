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
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'description' => $this->faker->text,
            'featured' => $this->faker->randomElement([true, false]),
            'category_id' => $this->faker->numberBetween(1, 10),
            'discount' => $this->faker->randomFloat(2, 1, 100),
            'vat' => $this->faker->randomFloat(2, 1, 10),
            'stock' => $this->faker->numberBetween(1, 100),
            'weight' => $this->faker->numberBetween(1, 100),
        ];
    }
}
