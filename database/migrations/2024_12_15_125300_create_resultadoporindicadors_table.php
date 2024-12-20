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
        Schema::create('resultadoporindicadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idcolegios');
            $table->unsignedBigInteger('identregableporindicador');
            $table->integer('valor');
            $table->foreign('idcolegios')->references('idcolegios')->on('colegios');
            $table->foreign('identregableporindicador')->references('identregableporindicador')->on('entregableporindicadors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultadoporindicadors');
    }
};
