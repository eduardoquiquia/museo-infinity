<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarjeta_asignadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('fecha_vinculacion')->index();
            $table->string('numero_tarjeta', 20)->unique();
            $table->enum('estado', ['activa', 'inactiva', 'bloqueada'])->default('activa')->index();

            $table->index(['user_id', 'estado']);
            $table->index(['fecha_vinculacion', 'estado']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarjeta_asignadas');
    }
};
