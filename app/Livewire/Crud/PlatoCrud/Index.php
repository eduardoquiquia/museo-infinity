<?php

namespace App\Livewire\Crud\PlatoCrud;

use App\Models\Plato;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'platoActualizado' => 'refresh'
    ];

    // Emitir evento para abrir modal desde otro componente
    public function editar($id)
    {
        $this->dispatch('abrir-modal-editar-plato', id: $id);
    }

    public function deletePlato($id)
    {
        Plato::findOrFail($id)->delete();
        $this->dispatch('platoActualizado');
    }

    public function render()
    {
        return view('livewire.crud.plato-crud.index');
    }
}
