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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->foreignId('country_id')->nullable();
            $table->string('name', 250);
            $table->string('sku', 20)->unique();
            $table->integer('weight')->default(0);
            $table->float('purchase_price')->default(0.0);
            $table->float('sale_price')->default(0.0);
            $table->float('discount_price')->default(0.0);
            $table->float('vat')->default(0.0);
            $table->integer('stock')->default(1);
            $table->integer('low_stock_report')->default(1);
            $table->integer('min_order_qty')->default(1);
            $table->integer('max_order_qty')->default(10);
            $table->text('description')->nullable();
            $table->text('other_details')->nullable();
            $table->string('image',500)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
