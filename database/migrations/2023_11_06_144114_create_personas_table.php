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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_aleatorio')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->unsignedBigInteger('tipo_utilidad_id');
            $table->foreign('tipo_utilidad_id')->references('id')->on('tipo_utilidads');

            $table->unsignedBigInteger('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('numero_documento')->nullable();
            $table->string('numero_celular')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->text('direccion_fiscal')->nullable();
            $table->text('referencia')->nullable();
            $table->integer('aceptacion_termino')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->unsignedBigInteger('estado_proceso_id')->default(1); // 1 es el valor predeterminado que se asignará;
            $table->foreign('estado_proceso_id')->references('id')->on('estado_procesos');
            $table->string('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
