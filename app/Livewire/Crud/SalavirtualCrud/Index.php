<?php

namespace App\Livewire\Crud\SalavirtualCrud;

use App\Models\SalaVirtual;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'salaActualizado' => 'refresh'
    ];

    // Emitir evento para abrir modal desde otro componente
    public function editar($id)
    {
        $this->dispatch('abrir-modal-editar-sala', id: $id);
    }

    public function deleteSala($id)
    {
        SalaVirtual::findOrFail($id)->delete();
        $this->dispatch('salaActualizado');
    }

    public function render()
    {
        return view('livewire.crud.salavirtual-crud.index');
    }
}
