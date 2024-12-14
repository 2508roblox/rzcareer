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
        Schema::create('interviewers', function (Blueprint $table) {
            $table->id();  // bigint primary key
            $table->string('full_name', 255);  // VARCHAR(255)
            $table->string('email', 255);  // VARCHAR(255)
            $table->string('position', 255);  // VARCHAR(255)
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviewers');
    }
};
