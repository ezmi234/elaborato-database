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
        Schema::create('interventi', function (Blueprint $table) {
            $table->id('codice_intervento');
            $table->timestamps();
            $table->decimal('costo_totale', 10, 2);
            $table->decimal('costo_ricambi', 10, 2);
            $table->decimal('costo_ore_di_lavoro', 10, 2);
            $table->string('metodo_pagamento');
            $table->text('descrizione');

            $table->string('CF_cliente');
            $table->unsignedBigInteger('codice_officina');
            $table->unsignedBigInteger('numero_telaio');

            $table->foreign('CF_cliente')->references('CF')
                ->on('clienti')->onDelete('cascade');
            $table->foreign('codice_officina')->references('codice_officina')
                ->on('officine')->onDelete('cascade');
            $table->foreign('numero_telaio')->references('numero_telaio')
                ->on('veicoli')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventi');
    }
};
