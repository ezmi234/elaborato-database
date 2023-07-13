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
            $table->id();
            $table->unsignedBigInteger('codice_pezzo');
            $table->unsignedBigInteger('codice_intervento');

            $table->integer('quantita');

            $table->foreign('codice_pezzo')->references('codice_pezzo')
                ->on('pezzi_di_ricambio')->onDelete('cascade');
            $table->foreign('codice_intervento')->references('codice_intervento')
                ->on('interventi')->onDelete('cascade');

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
