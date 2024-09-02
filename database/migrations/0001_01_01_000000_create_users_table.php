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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password', 128);
            $table->timestamp('last_login')->nullable();
            $table->boolean('is_superuser')->default(0);
            $table->boolean('is_staff')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('full_name');
            $table->string('email', 100)->unique();
            $table->string('avatar_url', 300)->nullable();
            $table->string('avatar_public_id', 300)->nullable();
            $table->boolean('email_notification_active')->default(1);
            $table->boolean('sms_notification_active')->default(0);
            $table->boolean('has_company')->default(0);
            $table->boolean('is_verify_email')->default(0);
            $table->timestamps(6);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
