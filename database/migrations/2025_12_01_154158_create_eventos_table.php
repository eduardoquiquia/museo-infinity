<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->index();
            $table->text('descripcion');
            $table->date('fecha')->index();
            $table->string('hora');
            $table->enum('ubicacion', ['Sala principal', 'Auditorio', 'Jardin', 'Sala exposiciones']);
            $table->enum('categoria', ['Concierto', 'Exposicion', 'Taller', 'Conferencia'])->index();
            $table->decimal('precio', 8, 2);
            $table->integer('capacidad');
            $table->string('imagen_principal');
            $table->enum('estado', ['activo', 'inactivo', 'cancelado'])->default('activo')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
