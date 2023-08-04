<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Attribute;
use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class AttributeProductFactory extends Factory
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
            'attribute_id' => Attribute::all()->random()->id,
        ];
    }
}
