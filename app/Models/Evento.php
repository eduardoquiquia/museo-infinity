<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    const UBICACIONES = ['Sala principal', 'Auditorio', 'Jardin', 'Sala exposiciones'];
    const CATEGORIAS = ['Concierto', 'Exposicion', 'Taller', 'Conferencia'];
    const ESTADOS = ['activo', 'inactivo', 'cancelado'];

    /** @var list<string> */
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'hora',
        'ubicacion',
        'categoria',
        'precio',
        'capacidad',
        'imagen_principal',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'fecha' => 'date',
            'precio' => 'decimal:2',
            'capacidad' => 'integer',
        ];
    }

    public function entradas()
    {
        return $this->morphMany(Entrada::class, 'origen');
    }

    /** @var bool */ 
    public $timestamps = false;
}
