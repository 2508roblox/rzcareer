<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInterviewSlotsTable extends Migration
{
    public function up()
    {
        Schema::table('interview_slots', function (Blueprint $table) {
            $table->timestamp('end_time')->nullable(); // Thêm cột end_time
            $table->string('location')->nullable(); // Thêm cột location
            $table->foreignId('interviewer_id')->nullable()->constrained()->onDelete('set null'); // Thêm cột interviewer_id
        });
    }

    public function down()
    {
        Schema::table('interview_slots', function (Blueprint $table) {
            $table->dropForeign(['interviewer_id']); // Xóa ràng buộc khóa ngoại trước khi xóa cột
            $table->dropColumn(['end_time', 'location', 'interviewer_id']); // Xóa các cột khi rollback
        });
    }
}
