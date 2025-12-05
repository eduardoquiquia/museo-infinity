<?php

namespace App\Livewire\Componentes\ExhibicionComponent;

use Livewire\Component;

class Full extends Component
{   
    public $exhibicion;

    public function mount($exhibicion)
    {
        if (!$exhibicion->slug) {
            dd('EXHIBICION SIN SLUG', $exhibicion);
        }

        $this->exhibicion = $exhibicion;
    }

    public function render()
    {
        return view('livewire.componentes.exhibicion-component.full');
    }
}
