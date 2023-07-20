<?php

namespace Database\Seeders;

use App\Models\Admin\Product;
use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::factory(100)->create();

        $products = Product::all();

        foreach ($products as $product) {
            $this->createTranslations($product, 'title', [
                'ru' => fake()->sentence,
                'uz' => fake()->sentence,
            ]);
            $this->createTranslations($product, 'descr', [
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
