<?php

namespace App\Livewire\Crud\UserCrud;

use App\Models\User;
use Livewire\Component;

class CreateForm extends Component
{
    public $open = false;

    public $name;
    public $email;
    public $password;
    public $role = 'usuario';
    public $estado = 'activo';

    protected $listeners = ['abrir-modal-crear-usuario' => 'openModal'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|in:usuario,admin',
        'estado' => 'required|in:activo,inactivo',
    ];

    public function openModal()
    {
        $this->open = true;
    }

    public function cerrarModal()
    {
        $this->open = false;
    }

    public function crearUsuario()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
            'estado' => $this->estado,
        ]);

        $this->reset(['name','email','password','role']);
        $this->estado = 'activo';
        $this->open = false;

        $this->dispatch('usuario-creado');
    }

    public function render()
    {
        return view('livewire.crud.user-crud.create-form');
    }
}
