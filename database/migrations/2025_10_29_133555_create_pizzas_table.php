<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Pizzák tábla: nev (PK), kategorianev (FK), vegetarianus
     */
    public function up(): void
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->string('nev')->primary(); // Név az elsődleges kulcs
            $table->string('kategorianev'); // Külső kulcs a kategorias táblához
            $table->boolean('vegetarianus')->default(false);
            // Nincs szükség timestamps-re

            // Külső kulcs megkötés (FIGYELEM: a 'kategorias' táblának léteznie kell!)
            $table->foreign('kategorianev')->references('nev')->on('kategorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizzas');
    }
};

