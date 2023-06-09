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
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idUser')->nullable();
            $table->foreign('idUser')->references('id')->on('users');
            $table->unsignedBigInteger('idEquipo')->nullable();
            $table->foreign('idEquipo')->references('id')->on('equipos');
            $table->string('titulo',50)->nullable();
            $table->string('descripcion',250)->nullable();
            $table->string('observacion',250);
            $table->enum('prioridad',['Baja','Media','Alta']);
            $table->date('fechaLimite')->nullable();
            $table->unsignedBigInteger('idAsignadoPor')->nullable();
            $table->foreign('idAsignadoPor')->references('id')->on('users');
            $table->unsignedBigInteger('idAsignadoA')->nullable();
            $table->foreign('idAsignadoA')->references('id')->on('users');
            $table->unsignedBigInteger('idEstado')->nullable();
            $table->foreign('idEstado')->references('id')->on('estados');
            $table->unsignedBigInteger('idTipoIncidencia')->nullable();
            $table->foreign('idTipoIncidencia')->references('id')->on('tipos');
            $table->string('comentarioSolucion',500);        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidencias');
    }
};
