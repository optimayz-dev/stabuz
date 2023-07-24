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
            'title' => $this->faker->sentence,
            'descr' => $this->faker->paragraph,
            'file_url' => $this->faker->imageUrl(123, 84)
        ];
    }
}
