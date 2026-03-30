<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations (revert forms.project_id to required).
     */
    public function up()
    {
        // Drop any existing FK
        DB::statement('ALTER TABLE forms DROP CONSTRAINT IF EXISTS forms_project_id_foreign');
        DB::statement('ALTER TABLE forms DROP CONSTRAINT IF EXISTS forms_project_id_fkey');

        // Make column non-nullable again
        Schema::table('forms', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable(false)->change();
        });

        // Re-add FK with cascade on delete
        Schema::table('forms', function (Blueprint $table) {
            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
                  ->cascadeOnDelete();
        });
    }

    public function down()
    {
        // Reverse: make it nullable again
        DB::statement('ALTER TABLE forms DROP CONSTRAINT IF EXISTS forms_project_id_foreign');
        DB::statement('ALTER TABLE forms DROP CONSTRAINT IF EXISTS forms_project_id_fkey');

        Schema::table('forms', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable()->change();
            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
                  ->nullOnDelete();
        });
    }
};