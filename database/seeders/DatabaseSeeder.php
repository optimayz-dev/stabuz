<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin\Admin;
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



         Brand::factory(5)->create();
//        $this->call(BrandSeeder::class);
         Catalog::factory(10)->create();
//        $this->call(CatalogSeeder::class);
         Category::factory(15)->create();
//        $this->call(CategorySeeder::class);
         Subcategory::factory(30)->create();
//        $this->call(SubcategorySeeder::class);
         Product::factory(100)->create();
//        $this->call(ProductSeeder::class);


        Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => bcrypt('1234567'),
        ]);


    }
}
