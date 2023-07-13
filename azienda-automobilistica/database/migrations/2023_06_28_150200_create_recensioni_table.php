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
        Schema::create('recensioni', function (Blueprint $table) {
            $table->id('codice_recensione');
            $table->timestamps();
            $table->integer('voto');
            $table->string('messaggio');
            $table->unsignedBigInteger('codice_acquisto')->nullable();
            $table->unsignedBigInteger('codice_intervento')->nullable();
            $table->unsignedBigInteger('codice_compra_vendita')->nullable();
            $table->foreign('codice_acquisto')->references('codice_acquisto')
                ->on('acquisti_in_store')->onDelete('cascade');
            $table->foreign('codice_intervento')->references('codice_intervento')
                ->on('interventi')->onDelete('cascade');
            $table->foreign('codice_compra_vendita')->references('codice_compra_vendita')
                ->on('compra_vendite_auto')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recensioni');
    }
};
