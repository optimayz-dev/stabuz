<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\PromotionBanner;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promotion_banner_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->foreignIdFor(PromotionBanner::class);
            $table->unique(['promotion_banner_id', 'locale']);
            $table->string('title')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_banner_translations');
    }
};
