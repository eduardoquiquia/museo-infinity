<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ActividadReciente extends Model
{
    protected $fillable = ['tipo', 'descripcion', 'entidad_type', 'entidad_id'];

    public function entidad(): MorphTo
    {
        return $this->morphTo();
    }
}
