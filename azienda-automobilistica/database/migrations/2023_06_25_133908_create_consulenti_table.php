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
        Schema::create('consulenti', function (Blueprint $table) {
            $table->string('CF')->primary();
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita');
            $table->integer('telefono', false, true);
            $table->decimal('percentuale_provvigione', 3, 2);
            $table->decimal('totale_provvigione', 10, 2);
            $table->decimal('bonus_recensione', 10, 2)->default(0.0);
            $table->decimal('media_recensione', 2, 1)->default(0.0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulenti');
    }
};
