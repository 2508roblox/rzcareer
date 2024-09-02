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
        Schema::create('job_post_notifications', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('user_id')->unsigned(); // Khóa ngoại đến bảng users
            $table->bigInteger('city_id')->unsigned(); // Khóa ngoại đến bảng common_cities
            $table->bigInteger('career_id')->unsigned(); // Khóa ngoại đến bảng common_careers
            $table->string('job_name', 255); // Tên công việc
            $table->string('position', 100); // Vị trí công việc
            $table->string('experience', 50); // Kinh nghiệm
            $table->integer('salary'); // Lương
            $table->integer('frequency'); // Tần suất thông báo
            $table->tinyInteger('is_active')->default(1); // Trạng thái kích hoạt (1: active, 0: inactive)
            $table->enum('salary_type', ['hourly', 'monthly', 'weekly']); // Kiểu lương
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('common_cities')->onDelete('cascade');
            $table->foreign('career_id')->references('id')->on('common_careers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_post_notifications');
    }
};
