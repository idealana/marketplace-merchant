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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->string('invoice_code', length: 20);
            $table->date('invoice_date');
            $table->dateTime('expired_at');
            $table->decimal('nominal_payment', total: 15, places: 2)->default(0.00);
            $table->dateTime('paid_at')->nullable();
            $table->enum('status', ['UNPAID', 'PAID', 'CANCEL']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
