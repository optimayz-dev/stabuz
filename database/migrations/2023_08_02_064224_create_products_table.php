<?php

use App\Models\Admin\Attribute;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Brand::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('file_url')->nullable();
            $table->integer('price')->nullable();
            $table->integer('old_price')->nullable();
            $table->integer('position')->nullable();
            $table->integer('amount')->nullable();
            $table->string('modification')->nullable();
            $table->string('article')->nullable();
            $table->string('supplier')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('credit')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
