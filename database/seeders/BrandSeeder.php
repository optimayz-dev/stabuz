<?php

namespace Database\Seeders;

use App\Models\Admin\Brand;
use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Brand::factory(5)->create()->each(function ($brand) {
            $this->createTranslations($brand, 'title', [
                'ru' => fake()->sentence,
                'uz' => fake()->sentence,
            ]);
            $this->createTranslations($brand, 'descr', [
                'ru' => fake()->sentence,
                'uz' => fake()->sentence,
            ]);
        });
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
