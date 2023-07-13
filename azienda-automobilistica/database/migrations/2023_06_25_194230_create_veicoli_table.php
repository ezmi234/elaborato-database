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
            $table->unsignedBigInteger('numero_telaio')->primary();
            $table->timestamps();
            $table->string('marca');
            $table->string('modello');
            $table->string('targa');
            $table->integer('anno_immatricolazione');
            $table->string('colore');
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
