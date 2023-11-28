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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_type')->nullable();
            $table->string('pay_type')->nullable();
            $table->string('delivery_type')->nullable();
            $table->bigInteger('pick_up_point_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->jsonb('guest')->nullable();
            $table->text('description')->nullable();
            $table->string('order_status')->nullable();
            $table->string('order_pay_status')->nullable();
            $table->string('order_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
