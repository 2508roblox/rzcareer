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
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->bigInteger('location_id')->unsigned(); // Khóa ngoại đến bảng common_locations
            $table->bigInteger('user_id')->unsigned(); // Khóa ngoại đến bảng users
            $table->string('company_name', 255); // Tên công ty
            $table->string('slug', 255); // Đường dẫn thân thiện
            $table->string('company_image_url', 300)->nullable(); // URL hình ảnh công ty
            $table->string('company_image_public_id', 200)->nullable(); // Public ID hình ảnh công ty
            $table->string('company_cover_image_url', 300)->nullable(); // URL hình ảnh bìa công ty
            $table->string('company_cover_image_public_id', 200)->nullable(); // Public ID hình ảnh bìa công ty
            $table->string('facebook_url', 200)->nullable(); // URL Facebook
            $table->string('youtube_url', 200)->nullable(); // URL YouTube
            $table->string('linkedin_url', 200)->nullable(); // URL LinkedIn
            $table->string('company_email', 100)->nullable(); // Email công ty
            $table->string('company_phone', 15)->nullable(); // Số điện thoại công ty
            $table->string('website_url', 300)->nullable(); // URL website
            $table->string('tax_code', 30)->nullable(); // Mã số thuế
            $table->date('since')->nullable(); // Ngày thành lập
            $table->string('field_operation', 255)->nullable(); // Lĩnh vực hoạt động
            $table->longText('description')->nullable(); // Mô tả công ty
            $table->smallInteger('employee_size')->nullable(); // Số lượng nhân viên
            $table->timestamps(); // Timestamps

            // Khóa ngoại
            $table->foreign('location_id')->references('id')->on('common_locations')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
