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
            $table->foreignIdFor(\App\Models\Accessorio::class, 'codice_accessorio')->onCascade('delete');
            $table->foreignIdFor(\App\Models\AcquistoInStore::class, 'codice_acquisto')->onCascade('delete');
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
