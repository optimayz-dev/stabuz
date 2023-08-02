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
            'product_id' => Product::all()->random()->id,
            'price' => fake()->randomFloat(2, 10, 1000), // Случайная цена от 10 до 1000 с двумя знаками после запятой
            'old_price' => fake()->randomFloat(2, 5, 1000), // Случайная старая цена от 5 до 1000 с двумя знаками после запятой
            'currency_code' => fake()->randomElement(['USD', 'EUR', 'UZS']), // Случайно выбираем одну из указанных валют
        ];
    }
}
