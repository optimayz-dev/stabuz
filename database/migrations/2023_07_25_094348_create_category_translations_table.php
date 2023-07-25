<?php

use App\Models\Admin\Category;
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
        Schema::create('category_translations', function (Blueprint $table) {
            // mandatory fields
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->foreignIdFor(Category::class);
            $table->unique(['category_id', 'locale']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Actual fields you want to translate
            $table->string('title');
            $table->longText('descr');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_translations');
    }
};
