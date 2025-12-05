<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exhibicions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->index();
            $table->string('slug')->unique();
            $table->text('descripcion');
            $table->enum('categoria', ['Dinosaurios', 'Mamiferos Extintos', 'Arte Rupestre', 'Herramientas Antiguas']);
            $table->string('imagen_principal');
            $table->string('imagen_360')->nullable();
            $table->enum('periodo', ['Periodo Triásico', 'Periodo Jurásico', 'Periodo Cretácico']);
            $table->date('fecha_descubrimiento')->index();
            $table->string('lugar_hallazgo');
            $table->text('descripcion_detallada');
            $table->boolean('destacada')->default(false);
            $table->enum('estado', ['Publicado', 'Borrador', 'Archivado'])->default('Borrador')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibicions');
    }
};
