<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\BrandCategory>
 */
class BrandCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_id' => Brand::all()->random()->id,
            'title' => fake()->title,
            'seo_title' => fake()->sentence,
            'seo_description' => fake()->paragraph,
            'meta_keywords' => fake()->sentence,
        ];
    }
}
