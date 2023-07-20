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
    public function run(): void
    {
        Brand::factory(5)->create()->each(function ($brand) {
            $brand->translate('uz')->fill([
                'title' => 'English Title',
                'descr' => 'English Description',
            ])->save();

            $brand->translate('ru')->fill([
                'title' => 'Название на русском',
                'descr' => 'Описание на русском',
            ])->save();

            // Добавьте переводы для других языков, если требуется
        });
    }
}
