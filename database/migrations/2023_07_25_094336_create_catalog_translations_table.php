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
            $table->foreign('catalog_id')->references('id')->on('catalogs')->onDelete('cascade');

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
        Schema::dropIfExists('catalog_translations');
    }
};
