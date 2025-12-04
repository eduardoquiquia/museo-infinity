<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reserva extends Model
{
    const ESTADOS = ['pendiente', 'confirmada', 'cancelada'];

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'contacto',
        'fecha',
        'hora',
        'personas',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'fecha' => 'date',
            'hora' => 'datetime',
            'personas' => 'integer'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pedido(): HasOne
    {
        return $this->hasOne(Pedido::class);
    }

    /** @var bool */ 
    public $timestamps = false;
}
