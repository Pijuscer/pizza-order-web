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
            $table->integer('user_id');
            $table->integer('pizza_id');
            $table->integer('pizza_size_price_id');
            $table->integer('pizza_attachments_id');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('pizza_size_price_id')->references('id')->on('size_prices');
            $table->foreign('pizza_attachments_id')->references('id')->on('attachments');
            
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
