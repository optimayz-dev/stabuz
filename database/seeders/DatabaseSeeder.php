<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\Admin;
use App\Models\Admin\Attribute;
use App\Models\Admin\Brand;
use App\Models\Admin\Catalog;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();



         Brand::factory(20)->create();

         Catalog::factory(30)->create();

         Category::factory(60)->create();

         Subcategory::factory(100)->create();

         Product::factory(10000)->create();

         Attribute::factory(2000)->create();


        Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => bcrypt('1234567'),
        ]);


    }
}
