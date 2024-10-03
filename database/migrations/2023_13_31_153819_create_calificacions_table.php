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
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_aleatorio')->nullable();
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('personas');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('publicacion_id');
            $table->foreign('publicacion_id')->references('id')->on('publicacions');
            $table->unsignedBigInteger('estado_proceso_id')->default(1); // 1 es el valor predeterminado que se asignará;
            $table->foreign('estado_proceso_id')->references('id')->on('estado_procesos');
            $table->datetime('fecha_registrada')->nullable();
            $table->integer('valor')->nullable();
            $table->string('comentario')->nullable();
            $table->string('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificacions');
    }
};
