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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();  // bigint primary key
            // candidate_id is a foreign key referencing the users table
            $table->foreignId('candidate_id')->constrained(table: 'users')->onDelete('cascade');
            $table->enum('status', ['scheduled', 'completed', 'canceled']);  // ENUM
            $table->foreignId('slot_id')->constrained('interview_slots');  // FK slot_id
            $table->text('feedback')->nullable();  // feedback text
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
