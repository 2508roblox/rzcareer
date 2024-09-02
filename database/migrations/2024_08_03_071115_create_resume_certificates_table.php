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
        Schema::create('resume_certificates', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('resume_id')->unsigned(); // Khóa ngoại đến bảng resumes
            $table->string('name', 200); // Tên chứng chỉ
            $table->string('training_place', 255); // Nơi đào tạo
            $table->date('start_date'); // Ngày bắt đầu
            $table->date('expiration_date'); // Ngày hết hạn
            $table->string('description', 500); // Mô tả
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_certificates');
    }
};
