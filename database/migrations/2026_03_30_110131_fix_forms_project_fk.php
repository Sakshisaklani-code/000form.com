<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        // Step 0: Drop FK if it exists
        DB::statement('ALTER TABLE forms DROP CONSTRAINT IF EXISTS forms_project_id_foreign');

        // Step 1: Get all users
        $users = DB::table('users')->pluck('id');

        foreach ($users as $userId) {
            // Step 2: Ensure a default "Standalone" project exists for this user
            $defaultProjectId = DB::table('projects')
                ->where('name', 'Standalone')
                ->where('user_id', $userId)
                ->value('id');

            if (! $defaultProjectId) {
                $defaultProjectId = Str::uuid()->toString();
                DB::table('projects')->insert([
                    'id'         => $defaultProjectId,
                    'name'       => 'Standalone',
                    'user_id'    => $userId,
                    'color'      => '#6366f1',
                    'status'     => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Step 3: Assign all forms of this user with null project_id to their default project
            DB::table('forms')
                ->where('user_id', $userId)
                ->whereNull('project_id')
                ->update([
                    'project_id' => $defaultProjectId
                ]);
        }

        // Step 4: Make project_id column non-nullable
        Schema::table('forms', function (Blueprint $table) {
            $table->uuid('project_id')->nullable(false)->change();
        });

        // Step 5: Add FK safely
        DB::statement('ALTER TABLE forms ADD CONSTRAINT forms_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE forms DROP CONSTRAINT IF EXISTS forms_project_id_foreign');

        Schema::table('forms', function (Blueprint $table) {
            $table->uuid('project_id')->nullable()->change();
        });

        DB::statement('ALTER TABLE forms ADD CONSTRAINT forms_project_id_foreign FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE SET NULL');
    }
};