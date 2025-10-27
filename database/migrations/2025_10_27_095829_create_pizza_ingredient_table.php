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
        // Pivot tábla a pizzas és ingredients közötti sok-sok kapcsolathoz
        Schema::create('pizza_ingredient', function (Blueprint $table) {
            
            // Fő kulcsok hiányoznak a pivot táblából
            $table->foreignId('pizza_id')->constrained()->onDelete('cascade'); // Hivatkozás a pizzas táblára
            $table->foreignId('ingredient_id')->constrained()->onDelete('cascade'); // Hivatkozás az ingredients táblára

            // A két kulcs együtt lesz a kompozit elsődleges kulcs
            $table->primary(['pizza_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_ingredient');
    }
};
