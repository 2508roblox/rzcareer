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
        Schema::create('common_locations', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->string('address', 255); // Địa chỉ
            $table->double('lat'); // Vĩ độ
            $table->double('lng'); // Kinh độ
            $table->bigInteger('district_id')->unsigned(); // Khóa ngoại đến bảng district
            $table->bigInteger('city_id')->unsigned(); // Khóa ngoại đến bảng district
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('district_id')->references('id')->on('common_districts')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('common_cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_locations');
    }
};
