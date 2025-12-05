<?php

namespace App\Livewire\Componentes\ExhibicionComponent;

use Livewire\Component;

class Simple extends Component
{
    public $exhibicion;

    public function mount($exhibicion)
    {
        $this->exhibicion = $exhibicion;
    }

    public function render()
    {
        return view('livewire.componentes.exhibicion-component.simple');
    }
}
