<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plato extends Model
{
    const CATEGORIAS = ['Entradas', 'Platos principales', 'Acompañamientos', 'Postres', 'Bebidas'];
    const ESTADOS = ['Disponible', 'Agotado', 'Inactivo'];

    /** @var list<string> */
    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria',
        'precio',
        'imagen_principal',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'precio' => 'decimal:2'
        ];
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(PedidoDetalle::class);
    }

    /** @var bool */ 
    public $timestamps = false;
}
