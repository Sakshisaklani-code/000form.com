<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (! Schema::hasColumn('customers', 'paddle_id')) {
                $table->string('paddle_id')->nullable()->after('billable_type');
            }
            if (! Schema::hasColumn('customers', 'name')) {
                $table->string('name')->nullable()->after('paddle_id');
            }
            if (! Schema::hasColumn('customers', 'email')) {
                $table->string('email')->nullable()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['paddle_id', 'name', 'email']);
        });
    }
};
