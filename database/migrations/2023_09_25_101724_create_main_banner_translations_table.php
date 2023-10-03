<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\MainBanner;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('main_banner_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            $table->foreignIdFor(MainBanner::class);
            $table->unique(['main_banner_id', 'locale']);
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_banner_translations');
    }
};
