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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('career_id')->unsigned(); // Khóa ngoại đến bảng common_careers
            $table->bigInteger('company_id')->unsigned(); // Khóa ngoại đến bảng companies (nếu có)
            $table->bigInteger('location_id')->unsigned(); // Khóa ngoại đến bảng common_locations
            $table->bigInteger('user_id')->unsigned(); // Khóa ngoại đến bảng users
            $table->string('job_name', 255); // Tên công việc
            $table->string('slug', 300); // Đường dẫn thân thiện
            $table->date('deadline'); // Hạn chót
            $table->integer('quantity'); // Số lượng cần tuyển
            $table->string('gender_required', 1); // Giới tính yêu cầu
            $table->longText('job_description'); // Mô tả công việc
            $table->longText('job_requirement'); // Yêu cầu công việc
            $table->longText('benefits_enjoyed'); // Quyền lợi được hưởng
            $table->string('position', 100); // Vị trí công việc
            $table->string('type_of_workplace', 100); // Loại hình công việc
            $table->string('experience', 50); // Kinh nghiệm
            $table->string('academic_level', 100); // Trình độ học vấn
            $table->string('job_type', 100); // Loại công việc
            $table->integer('salary_min'); // Lương tối thiểu
            $table->integer('salary_max'); // Lương tối đa
            $table->enum('salary_type', ['hourly', 'monthly', 'weekly']); // Kiểu lương
            $table->tinyInteger('is_hot')->default(0); // Có phải là việc hot không
            $table->tinyInteger('is_urgent')->default(0); // Có phải là việc gấp không
            $table->string('contact_person_name', 100); // Tên người liên hệ
            $table->string('contact_person_phone', 15); // Số điện thoại người liên hệ
            $table->string('contact_person_email', 100); // Email người liên hệ
            $table->bigInteger('views')->default(0); // Số lượt xem
            $table->bigInteger('shares')->default(0); // Số lượt chia sẻ
            $table->integer('status'); // Trạng thái công việc (chưa được liệt kê)
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('career_id')->references('id')->on('common_careers')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade'); // Nếu có bảng companies
            $table->foreign('location_id')->references('id')->on('common_locations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
