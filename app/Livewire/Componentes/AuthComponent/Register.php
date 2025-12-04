<?php

namespace App\Livewire\Componentes\AuthComponent;

use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:6|same:password_confirmation',
        'password_confirmation' => 'required',
    ];

    public function register()
    {
        // Validación Livewire
        $data = $this->validate();

        // Crear usuario
        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Loguear
        FacadesAuth::login($user);

        // Cerrar el modal (si existe un modal Livewire)
        $this->dispatch('cerrar-auth');

        // Redireccionar
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.componentes.auth-component.register');
    }
}
