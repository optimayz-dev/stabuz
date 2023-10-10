<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\PickUpPoint;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pick_up_point_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(PickUpPoint::class);
            $table->string('locale')->index();
            $table->unique(['pick_up_point_id', 'locale']);
            $table->string('city');
            $table->string('address')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pick_up_point_translations');
    }
};
