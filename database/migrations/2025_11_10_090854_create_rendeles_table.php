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
    Schema::create('rendeles', function (Blueprint $table) {
    $table->id('az'); // az = azonosító
    $table->string('pizzanev');
    $table->integer('darab');
    $table->dateTime('felvetel');
    $table->dateTime('kiszallitas');
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
