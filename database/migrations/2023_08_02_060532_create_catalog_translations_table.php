<?php

use App\Models\Admin\Catalog;
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
        Schema::create('catalog_translations', function (Blueprint $table) {
            // mandatory fields
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->foreignIdFor(Catalog::class);
            $table->unique(['catalog_id', 'locale']);
            // Actual fields you want to translate
            $table->string('title');
            $table->index('title');
            $table->string('seo_title');
            $table->text('seo_description');
            $table->string('meta_keywords');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_translations');
    }
};
