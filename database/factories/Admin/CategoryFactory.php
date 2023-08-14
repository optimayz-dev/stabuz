<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
            'lvl' => null,
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'seo_title' => fake()->sentence,
            'seo_description' => fake()->paragraph,
            'meta_keywords' => fake()->sentence,
        ];
    }
}
