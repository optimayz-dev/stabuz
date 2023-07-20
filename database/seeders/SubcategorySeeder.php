<?php

namespace Database\Seeders;

use App\Models\Admin\Subcategory;
use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {


        $subcategories = Subcategory::factory(30)->create();

        foreach ($subcategories as $subcategory) {
            $this->createTranslations($subcategory, 'title', [
                'ru' => fake()->sentence,
                'uz' => fake()->sentence,
            ]);
            $this->createTranslations($subcategory, 'descr', [
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
