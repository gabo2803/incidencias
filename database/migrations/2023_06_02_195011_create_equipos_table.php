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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('serial',20)->unique();
            $table->string('descripcion',25)->nullable();
            $table->string('caracteristicas',500);
            $table->date('fechaAdquirido');
            $table->date('fechaAsignado');
            $table->string('marca');
            $table->string('modelo');
            $table->string('garantia');
            $table->string('servitag');
            $table->string('precio');
            $table->unsignedBigInteger('idProvedor');
            $table->foreign('idProvedor')->references('id')->on('provedores');
            $table->enum('tipoActivo',['Activo fijo', 'Leasing','Comodato'])->nullable();
            $table->date('fechaVencGar');
            $table->unsignedBigInteger('idSuperCategoria')->nullable();
            $table->foreign('idSuperCategoria')->references('id')->on('supers');
            $table->unsignedBigInteger('idArea')->nullable();
            $table->foreign('idArea')->references('id')->on('areas');
            $table->enum('estado',['Activo', 'Inactivo']);
            $table->enum('calibracion',['Si', 'No']);
            $table->integer('frecuenciaCal');
            $table->date('fechaUltimaCal');
            $table->enum('riesgo',['l', 'llA','llB','lll']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
