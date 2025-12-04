<?php

namespace App\Livewire\Crud\UserCrud;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'usuarioActualizado' => 'refresh'
    ];

    // Emitir evento para abrir modal desde otro componente
    public function editar($id)
    {
        $this->dispatch('abrirModalEditar', id: $id);
    }

    public function deleteUser($id)
    {
        User::findOrFail($id)->delete();
        $this->dispatch('usuarioActualizado');
    }

    public function render()
    {
        return view('livewire.crud.user-crud.index', [
            'usuarios' => User::where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }
}
