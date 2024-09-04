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
            $table->foreignId('user_id_customer')->references('id')->on('users');
            $table->foreignId('merchant_id')->constrained();
            $table->integer('total_qty');
            $table->decimal('total_price', total: 15, places: 2);
            $table->dateTime('shipping_at');
            $table->dateTime('arrival_at')->nullable();
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
