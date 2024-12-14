<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToSeekerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seeker_profiles', function (Blueprint $table) {
            // Thêm các cột mới
            $table->text('introduction')->nullable()->after('marital_status'); // Giới thiệu bản thân
            $table->string('current_residence')->nullable()->after('introduction'); // Chỗ ở hiện tại
            $table->string('working_province')->nullable()->after('current_residence'); // Tỉnh/thành làm việc
            $table->string('degree')->nullable()->after('working_province'); // Bằng cấp
            $table->decimal('current_salary', 10, 2)->nullable()->after('degree'); // Mức lương hiện tại
            $table->decimal('expected_salary_min', 10, 2)->nullable()->after('current_salary'); // Mức lương mong muốn tối thiểu
            $table->decimal('expected_salary_max', 10, 2)->nullable()->after('expected_salary_min'); // Mức lương mong muốn tối đa
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seeker_profiles', function (Blueprint $table) {
            // Xóa các cột mới nếu rollback migration
            $table->dropColumn('introduction');
            $table->dropColumn('current_residence');
            $table->dropColumn('working_province');
            $table->dropColumn('degree');
            $table->dropColumn('current_salary');
            $table->dropColumn('expected_salary_min');
            $table->dropColumn('expected_salary_max');
        });
    }
}
