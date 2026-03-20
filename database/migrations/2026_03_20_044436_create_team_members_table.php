<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('workspace_owner_id');
            $table->string('member_user_id');
            $table->enum('role', ['viewer', 'editor', 'admin'])->default('viewer');
            $table->timestamp('joined_at')->useCurrent();
            $table->timestamps();

            $table->unique(['workspace_owner_id', 'member_user_id']);
            $table->index('workspace_owner_id');
            $table->index('member_user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};