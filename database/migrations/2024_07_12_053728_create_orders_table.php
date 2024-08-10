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
            $table->string('order_number',20);
            $table->unsignedBigInteger('payment_method_id');
            $table->char('status', 20)->default('open');
            $table->string('customer_name', 100);
            $table->string('customer_phone', 20);
            $table->string('customer_email', 100);
            $table->string('extra_note')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('shipping_address')->nullable();
            $table->string('billing_address')->nullable();
            $table->decimal('total', 10, 2)->default(0);
            $table->decimal('shipping_cost',10,2)->default(0);
            $table->decimal('discount',10,2)->default(0);
            $table->decimal('tax',10,2)->default(0);
            $table->integer('zip')->nullable();
            $table->string('city',50)->nullable();
            $table->timestamps();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
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
