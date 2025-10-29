<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Rendelések tábla: az (PK), pizzanev (FK), darab, felvetel, kiszallitas
     */
    public function up(): void
    {
        Schema::create('rendeles', function (Blueprint $table) {
            $table->id('az'); // Auto-incrementing ID, 'az' néven
            $table->string('pizzanev'); // Külső kulcs a pizzas táblához
            $table->integer('darab');
            $table->dateTime('felvetel');
            $table->dateTime('kiszallitas')->nullable(); // Lehet null
            // Nincs szükség timestamps-re

            // Külső kulcs megkötés (FIGYELEM: a 'pizzas' táblának léteznie kell!)
            $table->foreign('pizzanev')->references('nev')->on('pizzas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendeles');
    }
};