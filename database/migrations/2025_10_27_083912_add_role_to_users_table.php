<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. Adds the 'role' column to the 'users' table.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Role field: 'admin', 'regisztralt_latogato'
            // Default value is 'regisztralt_latogato'
            $table->string('role', 50)->default('regisztralt_latogato')->after('email');
        });
    }

    /**
     * Reverse the migrations. Drops the 'role' column from the 'users' table.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
