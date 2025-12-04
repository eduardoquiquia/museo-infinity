<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->enum('categoria', ['Entradas', 'Platos principales', 'Acompañamientos', 'Postres', 'Bebidas'])->index();
            $table->decimal('precio', 8, 2);
            $table->string('imagen_principal')->nullable();
            $table->enum('estado', ['Disponible', 'Agotado', 'Inactivo'])->default('disponible')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos');
    }
};
