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
    Schema::create('pizzas', function (Blueprint $table) {
    $table->id();
    $table->string('nev');           // pizza neve
    $table->string('kategorianev');  // kategoriák neve (szöveg)
    $table->boolean('vegetarianus'); // 0 vagy 1 a txt-ben
    $table->timestamps();
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
