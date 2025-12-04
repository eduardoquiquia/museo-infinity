<?php

namespace App\Livewire\Componentes\ExhibicionComponent;

use Livewire\Component;

class ExhibicionComponent extends Component
{
    public $exhibicion;
    public $tipo = 'simple';

    public function mount($exhibicion, $tipo = 'simple')
    {
        $this->exhibicion = $exhibicion;
        $this->tipo = $tipo;
    }

    public function render()
    {
        return view("livewire.componentes.exhibicion-component.{$this->tipo}");
    }
}