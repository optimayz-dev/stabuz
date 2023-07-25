<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Brand;
use App\Models\Admin\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Product>
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
            'subcategory_id' => Subcategory::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'title' => fake()->sentence,
            'descr' => fake()->paragraph,
            'file_url' => $this->faker->imageUrl(340, 338),
        ];
    }
}
