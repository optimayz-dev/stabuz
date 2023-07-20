<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::factory(15)->create();

        $categories = Category::all();

        foreach ($categories as $category) {
            $this->createTranslations($category, 'title', [
                'ru' => fake()->sentence,
                'uz' => fake()->sentence,
            ]);
            $this->createTranslations($category, 'descr', [
                'ru' => fake()->paragraph,
                'uz' => fake()->paragraph,
            ]);
        }
    }

    protected function createTranslations($model, $column, $translations)
    {
        foreach ($translations as $locale => $value) {
            Translation::create([
                'table_name' => $model->getTable(),
                'column_name' => $column,
                'foreign_key' => $model->id,
                'locale' => $locale,
                'value' => $value,
            ]);
        }
    }
}
