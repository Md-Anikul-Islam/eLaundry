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
            $table->unsignedBigInteger('user_id');
            $table->string('invoice_number');
            $table->date('order_date')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->text('shipping_address')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->string('delivery_type');
            $table->string('delivery_charge')->default(0);
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
