<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use Notifiable, TwoFactorAuthenticatable;

    const ROLES = ['usuario', 'admin'];
    const ESTADOS = ['activo', 'inactivo'];

    /** @var list<string> */    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'estado'
    ];

    /** @var list<string> */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
    ];

    /** @return array<string, */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function entradas(): HasMany
    {
        return $this->hasMany(Entrada::class);
    }
}
