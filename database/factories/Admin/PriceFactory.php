<?php

namespace Database\Factories\Admin;

use App\Models\Admin\CurrencyCode;
use App\Models\Admin\Price;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Price::class;

    public function definition(): array
    {
        return [
            'value' => $this->faker->randomFloat(2, 10, 1000),
            'old_price' => $this->faker->optional()->randomFloat(2, 5, 20),
            'product_id' => Product::inRandomOrder()->first()->id, // Используем существующий продукт из сида
            'currency_code_id' => CurrencyCode::inRandomOrder()->first()->id, // Используем существующую валюту из сида
        ];

    }
}
