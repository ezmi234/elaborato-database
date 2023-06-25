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
        Schema::create('acquisti_in_store', function (Blueprint $table) {
            $table->id('codice_acquisto');
            $table->timestamps();
            $table->decimal('costo_totale', 10, 2);
            $table->string('metodo_pagamento');

            $table->string('CF_cliente');
            $table->unsignedBigInteger('codice_officina');

            $table->foreign('CF_cliente')
                ->references('CF')
                ->on('clienti')
                ->onDelete('cascade');

            $table->foreign('codice_officina')
                ->references('codice_officina')
                ->on('officina')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acquisti_in_store');
    }
};
