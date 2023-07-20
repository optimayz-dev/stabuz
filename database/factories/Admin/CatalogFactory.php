<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Catalog>
 */
class CatalogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locales = ['ru', 'uz']; // Здесь перечислите доступные локали

        $catalog = [
            'title' => fake()->sentence,
            'descr' => fake()->paragraph,
        ];

        foreach ($locales as $locale) {
            $catalog[$locale.':title'] = fake()->sentence;
            $catalog[$locale.':descr'] = fake()->paragraph;
        }

        return $catalog;
    }
}
