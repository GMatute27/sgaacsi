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
        Schema::create('coordinadors', function (Blueprint $table) {
            $table->id('idcoordinador');
            $table->string('nombre');
            $table->unsignedBigInteger('idcolegios');
            $table->foreign('idcolegios')->references('idcolegios')->on('colegios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinadors');
    }
};
