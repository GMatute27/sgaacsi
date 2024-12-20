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
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id('iddimension');
            $table->timestamps();
            $table->string('nombre');
            $table->string('descripcion');
            $table->unsignedBigInteger('idambito');
            $table->foreign('idambito')->references(columns: 'idambito')->on('ambitos');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dimensions');
    }
};
