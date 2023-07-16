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
            $table->foreignId('codice_accessorio')
                ->constrained('accessori', 'codice_accessorio')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('codice_acquisto')
                ->constrained('acquisti_in_store', 'codice_acquisto')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('quantita');
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
