<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPUnit\Framework\once;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notificacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reporto')->nullable();
            $table->foreign('reporto')->references('id')->on('users');
            $table->unsignedBigInteger('activo')->nullable();
            $table->foreign('activo')->references('id')->on('equipos');
            $table->unsignedBigInteger('idIncidencia')->nullable();
            $table->foreign('idIncidencia')->references('id')->on('incidencias');
            $table->unsignedBigInteger('responsable')->nullable();
            $table->foreign('responsable')->references('id')->on('supers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacions');
    }
};
