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
        Schema::create('saved_resumes', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('resume_id')->unsigned(); // Khóa ngoại đến bảng resumes
            $table->bigInteger('company_id')->unsigned(); // Khóa ngoại đến bảng companies
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_resumes');
    }
};
