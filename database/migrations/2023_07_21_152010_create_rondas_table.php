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
        Schema::create('rondas', function (Blueprint $table) {
            $table->id();
            $table->integer('cedulaPaciente');
            $table->string('AfiNombre1');
            $table->string('AfiNombre2');
            $table->string('AfiApellido1');
            $table->string('AfiApellido2');
            $table->string('sexo');
            $table->string('descripcion');
            $table->date('fechaIngreso');
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rondas');
    }
};
