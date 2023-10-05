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
        Schema::table('products', function (Blueprint $table) {
            $table->string('modification')->nullable();
            $table->string('article')->nullable();
            $table->string('supplier')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('credit')->default(false);
            $table->integer('amount')->nullable();
            $table->integer('old_price')->nullable();
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
