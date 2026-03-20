<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_emails', function (Blueprint $table) {
            $table->id();

            // UUID foreign key — matches users.id type
            $table->uuid('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            $table->string('email')->unique();

            // Verification
            $table->boolean('is_verified')->default(false);
            $table->string('verification_token')->nullable();
            $table->timestamp('verification_sent_at')->nullable();
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();

            $table->index('user_id');
            $table->index('verification_token');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_emails');
    }
};