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

        // precio base por defecto
        $this->tipo = 'General';

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

        // precio del evento (fijo)
        $this->evento->precio;

        $this->open = true;
    }

    private function resetForm()
    {
        $this->fecha_visita = null;
        $this->cantidad = 1;
    }

    public function getPrecioTotalProperty()
    {
        if ($this->modo === 'evento') {
            $precioBase = $this->evento->precio ?? 0;
        } else {
            $precios = [
                'General'       => 15,
                'Adulto mayor'  => 10,
                'Estudiante'    => 8,
                'Niño'          => 5,
            ];

            $precioBase = $precios[$this->tipo] ?? 15;
        }

        return $precioBase * $this->cantidad;
    }


    public function guardar()
    {
        // Determinar precio base según modo
        if ($this->modo === 'evento') {
            $precioBase = $this->evento->precio;

        } else {
            $precios = [
                'General'       => 15,
                'Adulto mayor'  => 10,
                'Estudiante'    => 8,
                'Niño'          => 5,
            ];

            $precioBase = $precios[$this->tipo] ?? 15;
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

        if ($this->modo === 'evento') {
            $entrada->origen()->associate($this->evento);
            $entrada->save();
        }

        $this->open = false;

        $this->dispatch('abrir-modal-pago', [
            'origen_tipo' => \App\Models\Entrada::class,
            'origen_id'   => $entrada->id,
            'monto'       => $total,
            'descripcion' => $this->modo === 'evento'
                ? "Entrada para evento: {$this->evento->nombre}"
                : "Entrada presencial - {$this->tipo}",
            'fecha'       => $this->fecha ?? now()->toDateString(),
            'cantidad'    => $this->cantidad ?? 1,
        ]);
    }

    public function render()
    {
        return view('livewire.componentes.entrada-component.entrada-modal');
    }
}
