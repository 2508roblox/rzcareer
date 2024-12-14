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
        Schema::table('interview_slots', function (Blueprint $table) {
            $table->timestamp('start_time')->nullable(); // hoặc kiểu dữ liệu khác nếu cần
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('interview_slots', function (Blueprint $table) {
            //
        });
    }
};
