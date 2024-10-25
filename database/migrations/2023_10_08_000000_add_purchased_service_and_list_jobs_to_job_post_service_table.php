<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPurchasedServiceAndListJobsToJobPostServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('job_post_services', function (Blueprint $table) {
            $table->unsignedBigInteger('purchased_service_id')->nullable()->after('service_id');
            $table->json('list_jobs')->nullable()->after('purchased_service_id');

            $table->foreign('purchased_service_id')
                  ->references('id')
                  ->on('purchased_services')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_post_services', function (Blueprint $table) {
            $table->dropForeign(['purchased_service_id']);
            $table->dropColumn(['purchased_service_id', 'list_jobs']);
        });
    }
}
