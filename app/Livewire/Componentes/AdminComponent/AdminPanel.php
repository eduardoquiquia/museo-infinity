<?php

namespace App\Livewire\Componentes\AdminComponent;

use Livewire\Component;

class AdminPanel extends Component
{
    public $modulo = 'dashboard';

    public function seleccionar($modulo)
    {
        $this->modulo = $modulo;
    }
    
    public function render()
    {
        return view('livewire.componentes.admin-component.admin-panel');
    }
}
