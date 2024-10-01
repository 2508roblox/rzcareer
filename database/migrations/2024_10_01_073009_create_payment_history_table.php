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
        Schema::create('payment_history', function (Blueprint $table) {
            $table->bigIncrements('id');  // PK id
            $table->foreignId('user_id')->constrained('users');  // FK user_id
            $table->foreignId('invoice_id')->constrained('invoices');  // FK invoice_id
            $table->decimal('balance', 10, 2);  // DECIMAL(10,2)
            $table->enum('payment_method', ['credit_card', 'paypal', 'bank_transfer']);  // ENUM
            $table->enum('status', ['pending', 'successful', 'failed']);  // ENUM
            $table->date('payment_date');  // DATE
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_history');
    }
};
