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
        Schema::create('preguntas_respuestas', function (Blueprint $table) {
            $table->id();
            $table->string('respuesta');            
            $table->string('pregunta');                        
            $table->unsignedBigInteger('idRonda');
            $table->foreign('idRonda')->references('id')->on('rondas');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas_respuestas');
    }
};
