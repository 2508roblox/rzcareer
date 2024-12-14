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
        Schema::create('resume_advanced_skills', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->string('name', 200); // Tên kỹ năng
            $table->bigInteger('resume_id')->unsigned(); // Khóa ngoại đến bảng resumes

            $table->string('level', 50); // Cấp độ
            $table->timestamps(); // Timestamps
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_advanced_skills');
    }
};
