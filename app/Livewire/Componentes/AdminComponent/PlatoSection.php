<?php

namespace App\Livewire\Componentes\AdminComponent;

use Livewire\Component;

class PlatoSection extends Component
{
    public $search = '';

    public function openCreateModal()
    {
        // Dispara el evento al modal
        $this->dispatch('abrir-modal-crear');
    }

    public function render()
    {
        return view('livewire.componentes.admin-component.plato-section');
    }
}
