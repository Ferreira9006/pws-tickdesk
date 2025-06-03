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
       Schema::disableForeignKeyConstraints();

        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('level_id')->constrained();
            
        });
        Schema::enableForeignKeyConstraints();
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['categories_level_id_foreign']);
            $table->dropColumn('level_id');
        });
    }
};