<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\Brand;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
//            $table->dropForeign('products_brand_id_foreign');
//            $table->dropColumn('brand_id');
            $table->bigInteger('brand_id')->nullable();
            $table->float('price')->nullable()->change();
            $table->float('old_price')->nullable()->change();
//            $table->foreignIdFor(Brand::class)
//                ->nullable()
//                ->constrained()
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
