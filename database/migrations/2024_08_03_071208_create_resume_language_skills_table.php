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
        Schema::create('resume_language_skills', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('resume_id')->unsigned(); // Khóa ngoại đến bảng resumes
            $table->string('language', 50); // Ngôn ngữ
            $table->string('level', 50); // Cấp độ
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
        Schema::dropIfExists('resume_language_skills');
    }
};
