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
        Schema::create('compra_vendite_auto', function (Blueprint $table) {
            $table->id('codice_compra_vendita');
            $table->timestamps();
            $table->boolean('tipo_vendita');
            $table->decimal('costo_totale', 10, 2);
            $table->string('metodo_pagamento');

            $table->string('CF_cliente');
            $table->unsignedBigInteger('codice_officina');
            $table->string('CF_consulente');

            $table->foreign('CF_cliente')->references('CF')
                ->on('clienti')->onDelete('cascade');
            $table->foreign('codice_officina')->references('codice_officina')
                ->on('officina')->onDelete('cascade');
            $table->foreign('CF_consulente')->references('CF')
                ->on('consulenti')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compra_vendite_auto');
    }
};
