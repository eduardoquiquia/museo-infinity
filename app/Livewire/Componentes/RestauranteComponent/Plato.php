<?php

namespace App\Livewire\Componentes\RestauranteComponent;

use Livewire\Component;

class Plato extends Component
{   
    public $plato;

    public function mount($plato)
    {
        $this->plato = $plato;
    }

    public function render()
    {
        return view('livewire.componentes.restaurante-component.plato');
    }
}
