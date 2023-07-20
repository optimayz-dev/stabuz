<?php

namespace Database\Seeders;

use App\Models\Admin\Catalog;
use App\Models\Translation;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Catalog::factory(10)->create();

        $catalogs = Catalog::all();

        foreach ($catalogs as $catalog) {
            $this->createTranslations($catalog, 'title', [
                'ru' => fake()->sentence,
                'uz' => fake()->sentence,
            ]);
            $this->createTranslations($catalog, 'descr', [
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
