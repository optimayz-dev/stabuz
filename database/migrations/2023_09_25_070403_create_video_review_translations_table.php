<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\VideoReview;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('video_review_translations', function (Blueprint $table) {
            $table->id();

            $table->string('locale')->index();
            $table->foreignIdFor(VideoReview::class);
            $table->unique(['video_review_id', 'locale']);
            $table->string('title');
            $table->text('description');
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('slug')->unique();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_review_translations');
    }
};
