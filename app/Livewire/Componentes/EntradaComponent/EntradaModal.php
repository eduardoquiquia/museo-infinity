<?php

namespace App\Livewire\Componentes\EntradaComponent;

use App\Models\Entrada;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EntradaModal extends Component
{   
    public $open = false;

    // Modo: 'evento' | 'presencial'
    public $modo = 'presencial';

    // Datos dinámicos
    public $evento = null;

    // Formulario
    public $fecha_visita;
    public $tipo;
    public $cantidad = 1;

    protected $listeners = [
        'abrir-entrada-presencial' => 'modoPresencial',
        'abrir-entrada-evento'     => 'modoEvento',
    ];

    public function cerrar()
    {
        $this->open = false;
    }

    public function modoPresencial()
    {
        if (!Auth::check()) {
            $this->dispatch('abrir-auth');
            return;
        }

        $this->resetForm();
        $this->modo = 'presencial';
        $this->evento = null;
        $this->open = true;
    }

    public function modoEvento($id)
    {
        if (!Auth::check()) {
            $this->dispatch('abrir-auth');
            return;
        }

        $this->resetForm();
        $this->modo = 'evento';
        $this->evento = Evento::findOrFail($id);
        $this->open = true;
    }

    private function resetForm()
    {
        $this->fecha_visita = null;
        $this->tipo = null;
        $this->cantidad = 1;
    }

    public function guardar()
    {
        // Determinar precio base según modo
        if ($this->modo === 'evento') {
            // EVENTO → precio fijo del modelo Evento
            $precioBase = $this->evento->precio;

        } else {
            // PRESENCIAL → precio según tipo
            $preciosPresenciales = [
                'General'       => 15,
                'Adulto mayor'  => 10,
                'Estudiante'    => 8,
                'Niño'          => 5,
            ];

            $precioBase = $preciosPresenciales[$this->tipo] ?? 15;
        }

        $total = $precioBase * $this->cantidad;

        // Crear entrada
        $entrada = Entrada::create([
            'user_id'         => Auth::id(),
            'tipo'            => $this->tipo,
            'fecha_compra'    => today(),
            'fecha_visita'    => $this->fecha_visita,
            'cantidad'        => $this->cantidad,
            'precio_unitario' => $precioBase,
            'total'           => $total,
            'estado'          => 'pendiente',
        ]);

        // Relación morph
        if ($this->modo === 'evento') {
            $entrada->origen()->associate($this->evento);
            $entrada->save();
        }

        $this->open = false;

        // ABRIR modal de pago con info dynamic
        $this->dispatch('abrir-modal-pago', [
            'origen_tipo' => 'entrada',
            'origen_id'   => $entrada->id,
            'monto'       => $total,
            'descripcion' => $this->modo === 'evento'
                ? "Entrada para evento: {$this->evento->nombre}"
                : "Entrada presencial - {$this->tipo}",
        ]);
    }

    public function render()
    {
        return view('livewire.componentes.entrada-component.entrada-modal');
    }
}
