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
        Schema::create('meccanici', function (Blueprint $table) {
            $table->string('CF')->primary();
            $table->timestamps();
            $table->string('nome');
            $table->string('cognome');
            $table->date('data_nascita');
            $table->integer('telefono', false, true);
            $table->decimal('paga_oraria', 10, 2);
            $table->decimal('totale_ore_svolte', 10, 2)->default(0);
            $table->decimal('bonus_recensione', 10, 2)->default(0);
            $table->decimal('media_recensioni', 2, 1)->default(0);
            $table->integer('totale_recensioni')->default(0);
            $table->integer('numero_recensioni')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meccanici');
    }
};
