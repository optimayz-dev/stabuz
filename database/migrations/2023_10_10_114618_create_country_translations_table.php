<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\Country;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('country_translations', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('locale')->index();
            $table->foreignIdFor(Country::class);
            $table->unique(['country_id', 'locale']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_translations');
    }
};
