<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Pedido extends Model
{
    /** @var list<string> */
    protected $fillable = [
        'reserva_id',
        'fecha_hora',
        'total'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'reserva_id' => 'integer',
            'fecha_hora' => 'datetime',
            'total' => 'decimal:2'
        ];
    }

    public function reserva(): BelongsTo
    {
        return $this->belongsTo(Reserva::class);
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(PedidoDetalle::class);
    }

    public function pago(): MorphOne
    {
        return $this->morphOne(Pago::class, 'origen');
    }

    /** @var bool */ 
    public $timestamps = false;
}
