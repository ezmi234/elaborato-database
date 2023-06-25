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
        Schema::create('veicoli', function (Blueprint $table) {
            $table->bigInteger('numero_telaio')->primary();
            $table->string('marca');
            $table->string('modello');
            $table->string('targa');
            $table->integer('anno_immatricolazione');
            $table->string('colore');

            $table->string('codice_intervento')->nullable();
            $table->string('codice_compra_vendita')->nullable();

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
        Schema::dropIfExists('veicoli');
    }
};
