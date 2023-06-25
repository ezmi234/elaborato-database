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
            $table->id();
            $table->string('CF');
            $table->unsignedBigInteger('codice_intervento');

            $table->integer('ore_svolte');

            $table->foreign('CF')->references('CF')
                ->on('meccanici')->onDelete('cascade');
            $table->foreign('codice_intervento')->references('codice_intervento')
                ->on('interventi')->onDelete('cascade');

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
