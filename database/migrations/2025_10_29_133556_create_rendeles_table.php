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
            $table->id(); // rendeles.id
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade');
            $table->integer('darab');
            $table->dateTime('felvetel');
            $table->dateTime('kiszallitas')->nullable();
            $table->timestamps();
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
