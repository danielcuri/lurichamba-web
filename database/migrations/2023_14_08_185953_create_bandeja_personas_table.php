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
        Schema::create('bandeja_personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publicacion_id')->nullable();
            $table->foreign('publicacion_id')->references('id')->on('tipo_servicios');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas');

            $table->unsignedBigInteger('categoria_bandeja_id')->nullable();
            $table->foreign('categoria_bandeja_id')->references('id')->on('categoria_bandejas');

            $table->string('asunto')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('estado')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bandeja_personas');
    }
};
