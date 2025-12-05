<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Exhibicion extends Model
{
    const CATEGORIAS = ['Dinosaurios', 'Mamiferos Extintos', 'Arte Rupestre', 'Herramientas Antiguas'];
    const PERIODOS = ['Periodo Triásico', 'Periodo Jurásico', 'Periodo Cretácico'];
    const ESTADOS = ['Publicado', 'Borrador', 'Archivado'];


    /** @var list<string> */
    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'categoria',
        'imagen_principal',
        'imagen_360',
        'periodo',
        'fecha_descubrimiento',
        'lugar_hallazgo',
        'descripcion_detallada',
        'destacada',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'fecha_descubrimiento' => 'date',
            'destacada' => 'boolean',
        ];
    }

    public function imagenes(): MorphMany
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }

    public function SalaVirtual(): BelongsTo
    {
        return $this->belongsTo(SalaVirtual::class);
    }

    /** @var bool */ 
    public $timestamps = false;
}
