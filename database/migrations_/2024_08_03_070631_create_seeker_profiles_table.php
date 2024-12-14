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
        Schema::create('seeker_profiles', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('user_id')->unsigned(); // Khóa ngoại đến bảng users
            $table->bigInteger('location_id')->unsigned(); // Khóa ngoại đến bảng common_location
            $table->string('phone', 15); // Số điện thoại
            $table->date('birthday'); // Ngày sinh
            $table->string('gender', 1); // Giới tính
            $table->string('marital_status', 1); // Tình trạng hôn nhân
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('common_locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seeker_profiles');
    }
};
