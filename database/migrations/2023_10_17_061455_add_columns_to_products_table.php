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
            $table->boolean('popular')->nullable()->default(false);
            $table->boolean('new')->nullable()->default(false);
            $table->boolean('actual')->nullable()->default(false);
            $table->boolean('recommend')->nullable()->default(false);
            $table->string('file_url')->nullable()->change();
            $table->string('credit')->nullable()->default(false)->change();
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
