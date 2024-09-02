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
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('user_id')->unsigned(); // Khóa ngoại đến bảng users
            $table->bigInteger('seeker_profile_id')->unsigned(); // Khóa ngoại đến bảng seeker_profiles
            $table->bigInteger('city_id')->unsigned(); // Khóa ngoại đến bảng common_city
            $table->bigInteger('career_id')->unsigned(); // Khóa ngoại đến bảng common_careers
            $table->string('title', 200); // Tiêu đề
            $table->string('slug', 50); // Slug
            $table->longText('description'); // Mô tả
            $table->decimal('salary_min', 12, 2); // Mức lương tối thiểu
            $table->string('position', 50); // Vị trí
            $table->string('experience', 50); // Kinh nghiệm
            $table->string('academic_level', 50); // Trình độ học vấn
            $table->string('type_of_workplace', 50); // Loại nơi làm việc
            $table->string('job_type', 50); // Loại công việc
            $table->tinyInteger('is_active')->default(1); // Trạng thái kích hoạt
            $table->string('image_url', 200)->nullable(); // URL hình ảnh
            $table->string('file_url', 200)->nullable(); // URL tệp
            $table->string('public_id', 255)->nullable(); // ID công khai
            $table->string('type', 10); // Loại

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seeker_profile_id')->references('id')->on('seeker_profiles')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('common_cities')->onDelete('cascade');
            $table->foreign('career_id')->references('id')->on('common_careers')->onDelete('cascade');

            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
