<?php

namespace App\Livewire\Componentes\AuthComponent;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required|min:1',
    ];

    public function login()
    {
        $this->validate();

        // Intento de autenticación
        if (Auth::attempt(
            ['email' => $this->email, 'password' => $this->password],
            $this->remember
        )) {

            session()->regenerate();

            // cerrar modal si existe
            $this->dispatch('cerrar-auth');

            return redirect()->intended('/');
        }

        // Si falla
        $this->addError('email', 'Las credenciales no son correctas.');
    }

    public function render()
    {
        return view('livewire.componentes.auth-component.login');
    }
}
