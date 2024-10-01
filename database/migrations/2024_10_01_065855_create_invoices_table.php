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
            $table->id();  // PK id
            $table->string('invoice_code', 100);  // VARCHAR(100)
            $table->foreignId('user_id')->constrained('users');  // FK user_id
            $table->decimal('total_price', 10, 2);  // DECIMAL(10,2)
            $table->enum('status', ['pending', 'successful', 'failed']);  // ENUM
            
            $table->timestamps();  // created_at, updated_at
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
