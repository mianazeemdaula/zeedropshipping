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
        Schema::create('bank_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enter_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('bank_account_id')->constrained()->cascadeOnDelete();
            $table->date('payment_date');
            $table->string('type', 20);
            $table->string('reference', 100);
            $table->decimal('deduction', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->string('status', 20)->default('pending');
            $table->text('order_ids')->nullable();
            $table->string('invoice')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_transactions');
    }
};
