<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('company_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Khóa ngoại đến bảng companies
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Khóa ngoại đến bảng users
            $table->text('content'); // Nội dung đánh giá
            $table->integer('salary_benefit')->default(0); // Đánh giá lương thưởng & phúc lợi
            $table->integer('training_opportunity')->default(0); // Đánh giá đào tạo & học hỏi
            $table->integer('employee_care')->default(0); // Đánh giá sự quan tâm đến nhân viên
            $table->integer('company_culture')->default(0); // Đánh giá văn hoá công ty
            $table->integer('workplace_environment')->default(0); // Đánh giá văn phòng làm việc
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_reviews');
    }
}
