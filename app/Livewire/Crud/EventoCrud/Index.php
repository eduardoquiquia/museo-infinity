<?php

namespace App\Livewire\Crud\EventoCrud;

use App\Models\Evento;
use Livewire\Component;

class Index extends Component
{
    public $search = '';

    protected $listeners = [
        'eventoActualizado' => '$refresh'
    ];

    // Emitir evento para abrir modal desde otro componente
    public function editar($id)
    {
        $this->dispatch('abrir-modal-editar-evento', id: $id);
    }

    public function deleteEvento($id)
    {
        Evento::findOrFail($id)->delete();
        $this->dispatch('eventoActualizado');
    }

    public function render()
    {
        return view('livewire.crud.evento-crud.index', [
            'eventos' => Evento::where('nombre', 'like', "%{$this->search}%")
                ->orWhere('categoria', 'like', "%{$this->search}%")
                ->orWhere('ubicacion', 'like', "%{$this->search}%")
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }
}
