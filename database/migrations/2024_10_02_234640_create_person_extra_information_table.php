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
        Schema::create('person_extra_information', function (Blueprint $table) {
            $table->id();
            $table->string('distrito')->nullable();
            $table->string('comuna')->nullable();
            $table->string('coordenadas_geograficas')->nullable();
            $table->string('tipo_nucleo')->nullable();
            $table->longText('nombre_asentamiento_humano')->nullable();
            $table->string('tipo_via')->nullable();
            $table->string('nombre_via')->nullable();
            $table->string('numeracion')->nullable();
            $table->string('numero_ruc')->nullable();
            $table->string('tipo_organizacion')->nullable();
            $table->string('sexo')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('es_discapacidad')->nullable();
            $table->longText('grado_estudios')->nullable();
            $table->longText('centro_estudios')->nullable();
            $table->string('tipo_comprobante')->nullable();
            $table->string('tipo_emision')->nullable();
            $table->string('es_local_fisico')->nullable();
            $table->string('es_licencia')->nullable();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('person_extra_information');
    }
};
