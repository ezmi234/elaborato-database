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
        Schema::create('comprendono', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codice_acquisto');
            $table->unsignedBigInteger('codice_acessorio');

            $table->integer('quantita');

            $table->foreign('codice_acquisto')->references('codice_acquisto')
                ->on('acquisti_in_store')->onDelete('cascade');
            $table->foreign('codice_acessorio')->references('codice_acessorio')
                ->on('acessori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprendono');
    }
};
