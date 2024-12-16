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
        Schema::create('services', function (Blueprint $table) {
            $table->id();  // PK id
            $table->string('package_name', 255);  // VARCHAR(255)
            $table->string('illustration_image', 255)->nullable();  // Image URL
            $table->text('description')->nullable();  // TEXT
            $table->decimal('price', 10, 2);  // DECIMAL(10,2)
            $table->integer('duration');  // INT
            $table->integer('job_post_count');  // INT
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
        Schema::dropIfExists('services');
    }
};
