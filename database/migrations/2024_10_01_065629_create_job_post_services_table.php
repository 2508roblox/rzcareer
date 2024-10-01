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
        Schema::create('job_post_services', function (Blueprint $table) {
            $table->bigIncrements('id');  // PK id - bigint
            $table->foreignId(column: 'job_id')->constrained('job_posts');  // FK job_id - bigint
            $table->foreignId('service_id')->constrained('services');  // FK service_id - bigint
            $table->date('start_date');  // DATE
            $table->date('end_date');  // DATE
            $table->boolean('highlight_post')->default(false);  // BOOLEAN
            $table->boolean('top_sector')->default(false);  // BOOLEAN
            $table->boolean('border_effect')->default(false);  // BOOLEAN
            $table->boolean('hot_effect')->default(false);  // BOOLEAN
            $table->boolean('highlight_logo')->default(false);  // BOOLEAN
            $table->boolean('homepage_banner')->default(false);  // BOOLEAN
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_post_service');
    }
};
