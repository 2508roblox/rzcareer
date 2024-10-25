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
        Schema::table('interviews', function (Blueprint $table) {
            $table->foreignId('job_post_id')->constrained()->after('slot_id'); // Thêm cột job_post_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->dropForeign(['job_post_id']); // Xóa khóa ngoại nếu cần
            $table->dropColumn('job_post_id'); // Xóa cột nếu roll back
        });
    }
};
