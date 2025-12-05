<?php

namespace App\Livewire\Crud\ExhibicionCrud;

use App\Models\Exhibicion;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'exhibicionActualizado' => '$refresh',
        'exhibicionCreado' => '$refresh'
    ];

    // Emitir evento para abrir modal desde otro componente
    public function editar($id)
    {
        $this->dispatch('abrir-modal-editar-exhibicion', id: $id);
    }

    public function deleteEvento($id)
    {
        Exhibicion::findOrFail($id)->delete();
        $this->dispatch('exhibicionActualizado');
    }

    public function render()
    {
        return view('livewire.crud.exhibicion-crud.index', [
            'exhibiciones' => Exhibicion::where('titulo', 'like', "%{$this->search}%")
                ->orWhere('categoria', 'like', "%{$this->search}%")
                ->orWhere('periodo', 'like', "%{$this->search}%")
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }
}
