<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sala_virtuals', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->enum('categoria', ['Dinosaurios', 'Mamiferos Extintos', 'Arte Rupestre', 'Herramientas Antiguas']);
            $table->enum('nivel_experiencia', ['Básico', 'Intermedio', 'Avanzado']);
            $table->string('duracion')->nullable();       
            $table->string('salas_incluidas')->nullable();
            $table->string('imagen_principal')->nullable();
            $table->string('imagen_360')->nullable();
            $table->text('descripcion')->nullable();
            $table->json('highlights')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sala_virtuals');
    }
};
