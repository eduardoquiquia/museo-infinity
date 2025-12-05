<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalaVirtual extends Model
{
    const CATEGORIAS = ['Dinosaurios', 'Mamiferos Extintos', 'Arte Rupestre', 'Herramientas Antiguas'];
    const NIVEL_EXPERIENCIA = ['Básico', 'Intermedio', 'Avanzado'];
    const ESTADOS = ['activo', 'inactivo'];

    /** @var list<string> */
    protected $fillable = [
        'titulo',
        'subtitulo',
        'categoria',
        'nivel_experiencia',
        'salas_incluidas',
        'imagen_principal',
        'imagen_360',
        'descripcion',
        'highlights',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'highlights' => 'array',
        ];
    }

    public function exhibiciones(): HasMany
    {
        return $this->hasMany(Exhibicion::class);
    }

    /** @var bool */ 
    public $timestamps = false;
}
