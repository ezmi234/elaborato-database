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
            $table->foreignIdFor(\App\Models\Meccanico::class, 'CF_meccanico')->onCascade('delete');
            $table->foreignIdFor(\App\Models\Intervento::class, 'codice_intervento')->onCascade('delete');
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
