<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Brand>
 */
class BrandFactory extends Factory
{
    protected $model = Brand::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name,
            'description' => fake()->paragraph,
            'seo_title' => fake()->sentence,
            'seo_description' => fake()->paragraph,
            'meta_keywords' => fake()->sentence,
            'brand_logo' => $this->faker->imageUrl(123, 84)
        ];
    }
}
