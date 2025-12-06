<?php

namespace App\Livewire\Crud\UserCrud;

use App\Models\ActividadReciente;
use App\Models\User;
use Livewire\Component;

class EditForm extends Component
{   
    public $open = false;
    public $userId;
    public $name, $email, $role, $estado;

    protected $listeners = ['abrir-modal-editar-usuario' => 'cargarUsuario'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|in:usuario,admin',
        'estado' => 'required|in:activo,inactivo',
    ];

    public function cargarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        $this->userId = $usuario->id;
        $this->name   = $usuario->name;
        $this->email  = $usuario->email;
        $this->role   = $usuario->role;
        $this->estado = $usuario->estado;

        $this->open = true;
    }

    public function actualizar()
    {
        $this->validate();

        $usuario = User::findOrFail($this->userId);

        $usuario->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'estado' => $this->estado,
        ]);

        // Registrar actividad reciente
        ActividadReciente::create([
            'tipo' => 'actualizacion',
            'descripcion' => "El usuario {$usuario->name} fue actualizado.",
            'entidad_type' => User::class,
            'entidad_id' => $usuario->id,
        ]);

        // Cerrar modal
        $this->open = false;

        // Avisar al listado que se recargue
        $this->dispatch('usuarioActualizado');
    }

    public function render()
    {
        return view('livewire.crud.user-crud.edit-form');
    }
}
