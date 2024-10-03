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
        Schema::table('resumes', function (Blueprint $table) {
            Schema::table('resumes', function (Blueprint $table) {
                // Thay đổi city_id và career_id cho phép NULL
                $table->unsignedBigInteger('city_id')->nullable()->change();
                $table->unsignedBigInteger('career_id')->nullable()->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            // Đặt lại city_id và career_id không cho phép NULL
            $table->unsignedBigInteger('city_id')->nullable(false)->change();
            $table->unsignedBigInteger('career_id')->nullable(false)->change();
        });
    }
};
