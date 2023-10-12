<?php

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
        Schema::table('brand_translations', function (Blueprint $table) {
            $table->string('seo_title')->nullable()->change();
            $table->text('seo_description')->nullable()->change();
            $table->text('meta_keywords')->nullable()->change();
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brand_translations', function (Blueprint $table) {
            //
        });
    }
};
