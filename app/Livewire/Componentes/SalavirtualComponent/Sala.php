<?php

namespace App\Livewire\Componentes\SalavirtualComponent;

use Livewire\Component;

class Sala extends Component
{
    public $sala;

    public function mount($sala)
    {
        $this->sala = $sala;
    }

    public function render()
    {
        return view('livewire.componentes.salavirtual-component.sala');
    }
}
