<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('webhook_logs', function (Blueprint $table) {

            $table->id();

            // Paddle's unique event ID — used for idempotency check
            // Before processing any event we check: has this event_id been handled?
            $table->string('event_id')->unique();

            // e.g. subscription.created, transaction.payment_failed
            $table->string('event_type');

            // Full raw JSON payload from Paddle
            // Stored BEFORE processing so we can replay if the job crashes
            $table->json('payload');

            // When Paddle sent it to us
            $table->timestamp('received_at');

            // When our job finished processing it (null = not yet processed)
            $table->timestamp('processed_at')->nullable();

            // pending | success | failed | skipped
            // skipped = duplicate event already processed
            $table->string('status')->default('pending');

            // If processing failed, store the error message for debugging
            $table->text('error_message')->nullable();

            // Indexes for fast idempotency lookups
            $table->index('event_id');
            $table->index('event_type');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('webhook_logs');
    }
};