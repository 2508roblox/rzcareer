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
        Schema::create('company_images', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('company_id')->unsigned(); // Khóa ngoại đến bảng companies
            $table->string('image_url', 300); // URL hình ảnh
            $table->string('image_public_id', 300); // Public ID hình ảnh
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_images');
    }
};
