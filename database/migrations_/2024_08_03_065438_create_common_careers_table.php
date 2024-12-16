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
        Schema::create('common_careers', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->string('name', 150); // Tên nghề nghiệp
            $table->string('icon_url', 300); // URL của biểu tượng
            $table->string('app_icon_name', 50); // Tên biểu tượng ứng dụng
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('common_careers');
    }
};
