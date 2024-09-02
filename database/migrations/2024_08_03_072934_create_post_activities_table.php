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
        Schema::create('post_activities', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('job_post_id')->unsigned(); // Khóa ngoại đến bảng job_posts
            $table->bigInteger('resume_id')->unsigned(); // Khóa ngoại đến bảng resumes
            $table->bigInteger('user_id')->unsigned(); // Khóa ngoại đến bảng users
            $table->string('full_name', 100); // Họ và tên
            $table->string('email', 100); // Email
            $table->string('phone', 15); // Số điện thoại
            $table->enum('status', ['Chờ xác nhận', 'Đã liên hệ', 'Đã test', 'Đã phỏng vấn', 'Trúng tuyển', 'Không trúng tuyển']); // Trạng thái
            $table->tinyInteger('is_sent_email')->default(0); // Đã gửi email (0 = Không, 1 = Có)
            $table->tinyInteger('is_deleted')->default(0); // Đã xóa (0 = Không, 1 = Có)
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('job_post_id')->references('id')->on('job_posts')->onDelete('cascade');
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_activities');
    }
};
