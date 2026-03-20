<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_invitations', function (Blueprint $table) {
            $table->id();
            $table->string('workspace_owner_id');
            $table->string('invitee_email');
            $table->string('invitee_user_id')->nullable();
            $table->enum('role', ['viewer', 'editor', 'admin'])->default('viewer');
            $table->string('token', 64)->unique();
            $table->enum('status', ['pending', 'accepted', 'declined', 'expired'])->default('pending');
            $table->timestamp('expires_at');
            $table->timestamps();

            $table->index('workspace_owner_id');
            $table->index('token');
            $table->index('invitee_email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_invitations');
    }
};