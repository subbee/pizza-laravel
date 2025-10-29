    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         * Kategóriák tábla: nev (PK), ar
         */
        public function up(): void
        {
            Schema::create('kategorias', function (Blueprint $table) {
                $table->string('nev')->primary(); // Név az elsődleges kulcs
                $table->integer('ar');
                // Nincs szükség timestamps-re
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('kategorias');
        }
    };