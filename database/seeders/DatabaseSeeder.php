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

         Catalog::factory(10)->create();

         Category::factory(30)->create();

         Subcategory::factory(50)->create();

         Product::factory(500)->create();

         Attribute::factory(1000)->create();

         Tag::factory(100)->create();

         Price::factory(500)->create();

         AttributeProduct::factory(1000)->create();

         ProductTag::factory(50)->create();

    }
}
