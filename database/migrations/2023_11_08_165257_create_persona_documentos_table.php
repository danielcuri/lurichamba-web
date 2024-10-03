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
        Schema::create('persona_documentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documentacion_id');
            $table->foreign('tipo_documentacion_id')->references('id')->on('tipo_documentacions');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->string('url_documento')->nullable();
            $table->unsignedBigInteger('estado_proceso_id')->default(1); // 1 es el valor predeterminado que se asignará;
            $table->foreign('estado_proceso_id')->references('id')->on('estado_procesos');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona_documentos');
    }
};
