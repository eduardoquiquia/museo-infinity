<?php

namespace App\Livewire\Componentes\AdminComponent;

use Livewire\Component;

class UserSection extends Component
{
    public $search = '';

    public function openCreateModal()
    {
        // Dispara el evento al modal
        $this->dispatch('abrir-modal-crear-usuario');
    }

    public function render()
    {
        return view('livewire.componentes.admin-component.user-section');
    }
}
