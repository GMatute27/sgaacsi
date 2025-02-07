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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->string('evidencia');
            $table->string('observacion');
            $table->string('fundamentacion');
            $table->biginteger('idindicadores')->unsigned();
            $table->foreign('idindicadores')->references('idindicadores')->on('indicadores');
            $table->unsignedBigInteger('idcolegios');
            $table->foreign('idcolegios')->references('idcolegios')->on('colegios');
            $table->unsignedBigInteger('idrespuestas');
            $table->foreign('idrespuestas')->references('id')->on('respuestas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
