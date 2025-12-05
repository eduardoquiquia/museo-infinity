<?php

namespace App\Livewire\Componentes\EventoComponent;

use Livewire\Component;

class Full extends Component
{   
    public $evento;

    public function mount($evento)
    {
        if (!$evento->slug) {
            dd('EVENTO SIN SLUG', $evento);
        }

        $this->evento = $evento;
    }

    public function render()
    {
        return view('livewire.componentes.evento-component.full');
    }
}
