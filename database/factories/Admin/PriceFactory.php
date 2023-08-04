<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => $this->getNextProductId(),
            'value' => $this->faker->randomFloat(2, 10, 1000),
            'old_price' => $this->faker->randomFloat(2, 5, 1000),
            'currency_code' => $this->faker->randomElement(['UZS']),
        ];
    }

    public function getNextProductId()
    {
        static $productId = 1;

        return $productId++;
    }
}
