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
        Schema::table('forms', function (Blueprint $table) {
            
        $table->json('popup_config')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn('popup_config');
        });
    }

};
