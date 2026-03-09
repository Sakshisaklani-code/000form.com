<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('form_validations')) {
            Schema::create('form_validations', function (Blueprint $table) {
                $table->id();
                $table->uuid('form_id');
                $table->string('field_name');
                $table->string('field_type')->default('text');
                $table->boolean('is_required')->default(false);
                $table->integer('min_length')->nullable();
                $table->integer('max_length')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_validations');
    }
};
