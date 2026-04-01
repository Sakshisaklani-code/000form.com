<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('playground_form_submissions', function (Blueprint $table) {
            $table->id();

            // Core info
            $table->string('recipient_email')->index();
            $table->string('sender_email')->nullable()->index();
            $table->string('name')->nullable();

            // Dynamic fields (ALL form data)
            $table->json('fields')->nullable();

            // Special fields (_subject, _cc, etc.)
            $table->json('special_fields')->nullable();

            // File metadata (paths, names, mime, etc.)
            $table->json('attachments')->nullable();

            // Request metadata
            $table->ipAddress('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->text('referrer')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('playground_form_submissions');
    }
};
