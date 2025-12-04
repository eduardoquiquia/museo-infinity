<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TarjetaAsignada extends Model
{
    const ESTADOS = ['activa', 'inactiva', 'bloqueada'];
    
    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'fecha_vinculacion',
        'numero_tarjeta',
        'estado'
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'fecha_vinculacion' => 'datetime'   
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @var bool */ 
    public $timestamps = false;
}
