<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Imagen extends Model
{    
    /** @var list<string> */
    protected $fillable = [
        'ruta_imagen',
        'descripcion'
    ];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    /** @var bool */ 
    public $timestamps = false;
}