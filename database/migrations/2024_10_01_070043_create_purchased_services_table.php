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
        Schema::create('purchased_services', function (Blueprint $table) {
            $table->id();  // PK id
            $table->foreignId('user_id')->constrained('users');  // FK user_id
            $table->foreignId('service_id')->constrained('services');  // FK service_id
            $table->foreignId('invoice_id')->constrained('invoices');  // FK invoice_id
            $table->enum('status', ['pending', 'successful', 'failed']);  // ENUM
            $table->integer('quantity');  // INT
            $table->integer(column: 'used_quantity')->default(0);  // INT
            $table->date('purchase_date');  // DATE
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchased_services');
    }
};
