<?php

namespace App\Livewire\Componentes\PagoComponent;

use Livewire\Component;

class AlertaModal extends Component
{
    public $mostrar = false;
    public $tipo = 'success'; // success | error
    public $mensaje = '';
    public $detalle = '';

    protected $listeners = [
        'pagoExitoso' => 'mostrarExito',
        'pagoRechazado' => 'mostrarError'
    ];

    public function mostrarExito($mensaje = 'Pago realizado con éxito', $detalle = null)
    {
        $this->tipo = 'success';
        $this->mensaje = $mensaje;
        $this->detalle = $detalle;
        $this->mostrar = true;
    }

    public function mostrarError($mensaje = 'Error al procesar el pago', $detalle = null)
    {
        $this->tipo = 'error';
        $this->mensaje = $mensaje;
        $this->detalle = $detalle;
        $this->mostrar = true;
    }

    public function cerrar()
    {
        $this->mostrar = false;
    }

    public function render()
    {
        return view('livewire.componentes.pago-component.alerta-modal');
    }
}
