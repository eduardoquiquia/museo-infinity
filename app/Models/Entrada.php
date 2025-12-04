<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Entrada extends Model
{
    const TIPOS = ['General', 'Adulto mayor', 'Estudiante', 'Niño'];
    const ESTADOS = ['pendiente', 'confirmada', 'utilizada', 'cancelada'];

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'tipo',
        'fecha_compra',
        'fecha_visita',
        'cantidad',
        'precio_unitario',
        'total',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'fecha_compra' => 'date',
            'fecha_visita' => 'date',
            'cantidad' => 'integer',
            'precio_unitario' => 'decimal:2',
            'total' => 'decimal:2'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function origen(): MorphTo
    {
        return $this->morphTo();
    }

    public function pago(): MorphOne
    {
        return $this->morphOne(Pago::class, 'origen');
    }

    /** @var bool */ 
    public $timestamps = false;
}
