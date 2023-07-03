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

            $table->foreignIdFor(\App\Models\Cliente::class, 'CF_cliente')->onCascade('delete');
            $table->foreignIdFor(\App\Models\Officina::class, 'codice_officina')->onCascade('delete');
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
