<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plan_change_logs', function (Blueprint $table) {

            $table->id();

            // UUID foreign key — matches users.id type
            $table->uuid('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete();

            // e.g. personal → professional
            $table->string('from_plan');
            $table->string('to_plan');

            // Dollar amounts e.g. 15, 30, 90
            $table->integer('from_price');
            $table->integer('to_price');

            // The Paddle event that triggered this change
            $table->string('paddle_event_id')->nullable();

            $table->timestamp('changed_at');

            $table->timestamps();

            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plan_change_logs');
    }
};