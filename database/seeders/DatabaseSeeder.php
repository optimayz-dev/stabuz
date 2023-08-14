<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\Admin;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeProduct;
use App\Models\Admin\Brand;
use App\Models\Admin\BrandCategory;
use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use App\Models\Admin\Price;
use App\Models\Admin\Product;
use App\Models\Admin\ProductTag;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Tag;
use Database\Factories\Admin\CategoryProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => bcrypt('1234567'),
        ]);
         Brand::factory(10)->create();

         BrandCategory::factory(20)->create();

        // Создаем корневые категории
        $rootCategories = Category::factory()->count(5)->create();

// Создаем дочерние категории для каждой корневой категории
        $rootCategories->each(function ($rootCategory) {
            $rootCategory->lvl = null; // Уровень 0 для корневых категорий
            $rootCategory->save();

            $childCategoriesLevel1 = Category::factory()->count(3)->make([
                'lvl' => 1, // Уровень 1
            ]);
            $rootCategory->children()->saveMany($childCategoriesLevel1);

            // Создаем дочерние категории для каждой категории уровня 1
            foreach ($childCategoriesLevel1 as $childCategoryLevel1) {
                $childCategoriesLevel2 = Category::factory()->count(2)->make([
                    'lvl' => 2, // Уровень 2
                ]);
                $childCategoryLevel1->children()->saveMany($childCategoriesLevel2);

                foreach ($childCategoriesLevel2 as $childCategoryLevel2) {
                    $childCategoriesLevel3 = Category::factory()->count(2)->make([
                        'lvl' => 3, // Уровень 3
                    ]);
                    $childCategoryLevel2->children()->saveMany($childCategoriesLevel3);
                }
            }
        });


        // Создаем продукты и связываем их с категориями
        Product::factory(500)->create()->each(function ($product) {
            $categories = Category::inRandomOrder()->limit(rand(2, 3))->get();
            $product->categories()->attach($categories);
        });


         Attribute::factory(1000)->create();

         Tag::factory(100)->create();

         Price::factory(500)->create();

         AttributeProduct::factory(1000)->create();

         ProductTag::factory(50)->create();

    }
}
