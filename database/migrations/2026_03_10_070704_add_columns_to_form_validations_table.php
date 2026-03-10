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
        Schema::table('form_validations', function (Blueprint $table) {
            $table->foreignId('form_id')->constrained()->onDelete('cascade');
            $table->string('field_name');
            $table->string('field_type')->default('text');
            $table->boolean('is_required')->default(false);
            $table->unsignedInteger('min_length')->nullable();
            $table->unsignedInteger('max_length')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('form_validations', function (Blueprint $table) {
            //
        });
    }
};
