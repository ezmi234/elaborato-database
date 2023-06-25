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
        Schema::create('pezzi_di_ricambio', function (Blueprint $table) {
            $table->id('codice_pezzo');
            $table->string('nome');
            $table->decimal('prezzo', 10, 2);
            $table->string('modello');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pezzi_di_ricambio');
    }
};
