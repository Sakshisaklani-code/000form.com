<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            // Only add if it doesn't already exist
            if (! Schema::hasColumn('forms', 'project_id')) {
                $table->foreignUuid('project_id')
                      ->nullable()
                      ->after('user_id')
                      ->constrained()
                      ->nullOnDelete();

                $table->index('project_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn('project_id');
        });
    }
};