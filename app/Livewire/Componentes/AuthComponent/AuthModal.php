<?php

namespace App\Livewire\Componentes\AuthComponent;

use Livewire\Component;

class AuthModal extends Component
{
    public $isOpen = false;
    public $tab = 'login';

    protected $listeners = [
        'abrir-auth' => 'open',
        'cerrar-auth' => 'close',
    ];

    public function open($tab = 'login')
    {
        $this->isOpen = true;
        $this->tab = $tab;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function switchTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        return view('livewire.componentes.auth-component.auth-modal');
    }
}
