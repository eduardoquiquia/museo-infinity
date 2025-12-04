<?php

namespace App\Livewire\Componentes\EventoComponent;

use Livewire\Component;

class EventoComponent extends Component
{
    public $evento;
    public $tipo = 'simple';

    public function mount($evento, $tipo = 'simple')
    {
        $this->evento = $evento;
        $this->tipo = $tipo;
    }

    public function render()
    {
        return view("livewire.componentes.evento-component.{$this->tipo}");
    }
}
