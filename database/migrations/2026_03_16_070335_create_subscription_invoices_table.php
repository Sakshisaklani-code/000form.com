<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_invoices', function (Blueprint $table) {

            $table->id();

            // UUID foreign key — matches users.id type
            $table->uuid('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            // References your subscriptions table (bigint id is fine here)
            $table->foreignId('subscription_id')
                  ->constrained('subscriptions')
                  ->cascadeOnDelete();

            // Paddle transaction identifier — unique per payment
            $table->string('paddle_transaction_id')->unique();

            // Amount stored in cents to avoid float precision issues
            // e.g. $15.00 = 1500
            $table->integer('amount_cents');
            $table->string('currency', 3)->default('USD');

            // completed | refunded | partially_refunded
            $table->string('status')->default('completed');

            $table->timestamp('paid_at')->nullable();

            // Paddle-hosted PDF invoice download URL
            $table->string('invoice_url')->nullable();

            $table->timestamps();

            $table->index('user_id');
            $table->index('paddle_transaction_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscription_invoices');
    }
};