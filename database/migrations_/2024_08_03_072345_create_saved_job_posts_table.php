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
        Schema::create('saved_job_posts', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('job_post_id')->unsigned(); // Khóa ngoại đến bảng job_posts
            $table->bigInteger('user_id')->unsigned(); // Khóa ngoại đến bảng users
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('job_post_id')->references('id')->on('job_posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_job_posts');
    }
};
