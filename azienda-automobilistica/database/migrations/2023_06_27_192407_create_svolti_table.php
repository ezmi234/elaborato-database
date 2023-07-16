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
        Schema::create('svolti', function (Blueprint $table) {
            $table->string('CF_meccanico');
            $table->foreign('CF_meccanico')
                ->references('CF')
                ->on('meccanici');
            $table->foreignId('codice_intervento')
                ->constrained('interventi', 'codice_intervento')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('ore_svolte');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('svolti');
    }
};
