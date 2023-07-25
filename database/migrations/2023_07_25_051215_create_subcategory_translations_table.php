<?php

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
        Schema::create('subcategory_translations', function (Blueprint $table) {
            // mandatory fields
            $table->id();
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->foreignIdFor(Subcategory::class);
            $table->unique(['subcategory_id', 'locale']);
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

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
        Schema::dropIfExists('subcategory_translations');
    }
};
