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
        Schema::table('seeker_profiles', function (Blueprint $table) {
            // Thay đổi cột expected_salary_min
            $table->decimal('current_salary', 15, 2)->change();
            $table->decimal('expected_salary_min', 15, 2)->change();
            // Thay đổi cột expected_salary_max
            $table->decimal('expected_salary_max', 15, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seeker_profiles', function (Blueprint $table) {
            $table->decimal('current_salary', 15, 2)->change();

            $table->decimal('expected_salary_min', 10, 2)->change();
            $table->decimal('expected_salary_max', 10, 2)->change();
        });
    }
};
