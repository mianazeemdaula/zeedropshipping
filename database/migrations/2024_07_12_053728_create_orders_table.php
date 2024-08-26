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
            $table->unsignedBigInteger('packed_user_id')->nullable();
            $table->unsignedBigInteger('shipped_user_id')->nullable();
            $table->string('order_number',30);
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
            $table->string('zip',15)->nullable();
            $table->string('city',50)->nullable();
            $table->unsignedBigInteger('shipper_id')->nullable();
            $table->dateTime('packed_date')->nullable();
            $table->dateTime('shipped_date')->nullable();
            $table->dateTime('delivered_date')->nullable();
            $table->dateTime('canceled_date')->nullable();
            $table->string('cancel_reason',150)->nullable();
            $table->string('cancel_by',15)->nullable();
            $table->string('provider',50)->nullable();
            $table->unsignedInteger('profit')->default(0);
            $table->unsignedInteger('weight')->default(0);
            $table->json('track_data')->nullable(); 
            $table->timestamps();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipper_id')->references('id')->on('shippers')->onDelete('cascade');
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
