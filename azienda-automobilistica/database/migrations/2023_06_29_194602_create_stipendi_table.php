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
        Schema::create('stipendi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('importo', 10, 2);
            $table->string('CF_meccanico')->nullable();
            $table->string('CF_consulente')->nullable();

            $table->foreign('CF_meccanico')->references('CF')
                ->on('meccanici')->onDelete('cascade');
            $table->foreign('CF_consulente')->references('CF')
                ->on('consulenti')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stipendi');
    }
};
