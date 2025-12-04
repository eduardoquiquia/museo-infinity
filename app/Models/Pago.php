<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Pago extends Model
{
    const ESTADOS = ['pendiente', 'aprobado', 'rechazado',];

    /** @var list<string> */
    protected $fillable = [
        'monto',
        'estado',
        'transaccion_id',
        'detalle',
    ];

    public function origen(): MorphTo
    {
        return $this->morphTo();
    }
}
