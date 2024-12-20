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
        Schema::create('entregableporindicadors', function (Blueprint $table) {
            $table->id('identregableporindicador');
            $table->unsignedBigInteger('identregables');
            $table->unsignedBigInteger('idindicadores');
            $table->foreign('identregables')->references('identregables')->on('entregables');
            $table->foreign('idindicadores')->references('idindicadores')->on('indicadores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregableporindicadors');
    }
};
