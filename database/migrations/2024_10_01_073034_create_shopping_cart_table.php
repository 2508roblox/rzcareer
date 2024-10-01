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

        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->bigIncrements('id');  // PK id
            $table->foreignId('user_id')->constrained('users');  // FK user_id
            $table->foreignId('service_id')->constrained('services');  // FK service_id
            $table->integer('quantity');  // INT
            $table->decimal('total_price', 10, 2);  // DECIMAL(10,2)
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_cart');
    }
};
