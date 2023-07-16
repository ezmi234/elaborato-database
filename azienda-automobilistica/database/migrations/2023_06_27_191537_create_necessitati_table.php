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
        Schema::create('necessitati', function (Blueprint $table) {
            $table->foreignId('codice_pezzo')
                ->constrained('pezzi_di_ricambio', 'codice_pezzo')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('codice_intervento')
                ->constrained('interventi', 'codice_intervento')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('quantita');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('necessitati');
    }
};
