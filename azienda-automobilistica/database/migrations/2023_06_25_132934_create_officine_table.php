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
        Schema::create('officine', function (Blueprint $table) {
            $table->id('codice_officina');
            $table->string('nome');
            $table->string('sede_città');
            $table->string('sede_via');
            $table->integer('sede_civico');
            $table->decimal('bilancio', 10, 2);
            $table->boolean('centrale')->default(false);
            $table->foreignIdFor(\App\Models\Officina::class, 'gestita_da')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officine');
    }
};
