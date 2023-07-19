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
        Schema::create('clienti', function (Blueprint $table) {
            $table->string('CF', 16)->primary();
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita');
            $table->integer('telefono', false, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clienti');
    }
};
