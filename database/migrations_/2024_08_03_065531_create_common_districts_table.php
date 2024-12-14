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
        Schema::create('common_districts', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('city_id')->unsigned(); // Khóa ngoại đến bảng city
            $table->string('name', 150); // Tên quận/huyện
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('city_id')->references('id')->on('common_cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_districts');
    }
};
