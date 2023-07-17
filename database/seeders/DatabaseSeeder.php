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



         Brand::factory(30)->create();
         Catalog::factory(30)->create();
         Category::factory(270)->create();
         Subcategory::factory(1000)->create();
         Product::factory(100000)->create();
        Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@example.com',
            'password' => bcrypt('1234567'),
        ]);
    }
}
