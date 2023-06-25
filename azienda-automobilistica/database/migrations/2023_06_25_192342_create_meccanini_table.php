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
        Schema::create('meccanini', function (Blueprint $table) {
            $table->string('CF')->primary();
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita');
            $table->integer('telefono');
            $table->decimal('paga_oraria', 10, 2);
            $table->decimal('totale_ore_svolte', 10, 2);
            $table->decimal('bonus_recensione', 10, 2);
            $table->decimal('media_recensione', 1, 1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meccanini');
    }
};
