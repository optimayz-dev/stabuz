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
//    public function run(): void
//    {
//        $brands = Brand::factory(5)->create();
//
//        foreach ($brands as $brand) {
//            $this->createTranslations($brand, 'title', [
//                'uz' => 'Brend nomi',
//            ]);
//
//            $this->createTranslations($brand, 'descr', [
//                'uz' => 'Brend tavsifi',
//            ]);
//            $this->debugBrand($brand);
//        }
//    }

//    protected function createTranslations($model, $column, $translations)
//    {
//        foreach ($translations as $locale => $value) {
//            Translation::create([
//                'table_name' => $model->getTable(),
//                'column_name' => $column,
//                'foreign_key' => $model->id,
//                'locale' => $locale,
//                'value' => $value,
//            ]);
//        }
//    }

//    private function debugBrand($brand)
//    {
//        echo "Brand: " . $brand->title . " - " . $brand->descr . PHP_EOL;
//        echo "Translations:" . PHP_EOL;
//        foreach ($brand->translations as $translation) {
//            echo "Locale: " . $translation->locale . " - " . $translation->value . PHP_EOL;
//        }
//        echo PHP_EOL;
//    }

}
