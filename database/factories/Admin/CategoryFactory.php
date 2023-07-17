<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Catalog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Category>
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
            'catalog_id' => Catalog::all()->random()->id,
            'title' => fake()->sentence,
            'descr' => fake()->paragraph,
        ];
    }
}
