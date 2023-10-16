<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\StaticText;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('static_text_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(StaticText::class);

            $table->string('locale')->index();
            $table->unique(['static_text_id', 'locale']);

            $table->string('title');
            $table->string('seo_title_h1')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_text')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_text_translations');
    }
};
