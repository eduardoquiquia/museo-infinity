<?php

namespace App\Livewire\Componentes\EventoComponent;

use Livewire\Component;

class Simple extends Component
{   
    public $evento;

    public function mount($evento)
    {
        $this->evento = $evento;
    }

    public function render()
    {
        return view('livewire.componentes.evento-component.simple');
    }
}
