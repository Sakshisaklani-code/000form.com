<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── TABLE 1: customers ────────────────────────────────────
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('billable_id');
            $table->string('billable_type');
            $table->string('trial_ends_at')->nullable();
            $table->timestamps();

            $table->index(['billable_id', 'billable_type']);
        });

        // ── TABLE 2: paddle_subscriptions ────────────────────────
        // Named paddle_subscriptions to avoid conflict with your
        // custom subscriptions table
        Schema::create('paddle_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->uuid('billable_id');
            $table->string('billable_type');
            $table->string('name');
            $table->string('paddle_id')->unique();
            $table->string('status');
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('paused_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();

            $table->index(['billable_id', 'billable_type']);
        });

        // ── TABLE 3: subscription_items ───────────────────────────
        Schema::create('subscription_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')
                  ->constrained('paddle_subscriptions')
                  ->cascadeOnDelete();
            $table->string('product_id');
            $table->string('price_id');
            $table->string('status');
            $table->integer('quantity');
            $table->timestamps();
        });

        // ── TABLE 4: transactions ─────────────────────────────────
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('billable_id');
            $table->string('billable_type');
            $table->string('paddle_id')->unique();
            $table->string('paddle_subscription_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('status');
            $table->string('total');
            $table->string('tax');
            $table->string('currency', 3);
            $table->timestamp('billed_at');
            $table->timestamps();

            $table->index(['billable_id', 'billable_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_items');
        Schema::dropIfExists('paddle_subscriptions');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('customers');
    }
};