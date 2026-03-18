<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->string('paddle_subscription_id')->unique()->nullable();
            $table->string('paddle_customer_id')->nullable();
            $table->string('paddle_price_id')->nullable();
            $table->string('plan_name')->default('free');
            $table->string('billing_cycle')->default('monthly');
            $table->string('status')->default('active');
            $table->integer('submissions_limit')->default(50);
            $table->integer('submissions_used')->default(0);
            $table->integer('file_upload_limit_mb')->default(0);
            $table->integer('team_members_limit')->default(1);
            $table->boolean('webhooks_enabled')->default(false);
            $table->boolean('role_permissions_enabled')->default(false);
            $table->timestamp('current_period_start')->nullable();
            $table->timestamp('current_period_end')->nullable();
            $table->timestamp('next_billing_date')->nullable();
            $table->boolean('cancel_at_period_end')->default(false);
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('grace_period_ends_at')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('paused_at')->nullable();
            $table->timestamp('last_payment_at')->nullable();
            $table->string('paddle_last_event')->nullable();
            $table->timestamps();
            $table->index('user_id');
            $table->index('status');
        });
        // ← NO paddle_subscriptions here. Remove it if present.
    }

};