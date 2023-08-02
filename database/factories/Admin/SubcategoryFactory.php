<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Subcategory>
 */
class SubcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::all()->random()->id,
            'parent_id' => null,
            'seo_title' => fake()->sentence,
            'seo_description' => fake()->paragraph,
            'meta_keywords' => fake()->sentence,
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
        ];
    }
}
