<?php

namespace App\Livewire\Componentes\RestauranteComponent;

use App\Models\ActividadReciente;
use Livewire\Component;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservarForm extends Component
{
    // Control del modal
    public $open = false;
    
    // ID de la reserva recién creada
    public $reservaId = null;

    // Campos del formulario
    public $fecha;
    public $hora;
    public $personas = 1;
    public $contacto;
    public $comentarios;

    protected $listeners = ['abrir-modal-reserva' => 'abrir'];

    // Reglas de validación
    protected $rules = [
        'fecha' => 'required|date|after_or_equal:today',
        'hora' => 'required',
        'personas' => 'required|integer|min:1|max:10',
        'contacto' => 'required|string|max:20',
    ];

    // Abrir modal
    public function abrir()
    {
        $this->resetValidation();
        $this->open = true;
        $this->reservaId = null;
    }

    // Cerrar modal
    public function cerrar()
    {
        $this->open = false;
    }

    // Método para iniciar pedido
    public function iniciarPedido()
    {
        $this->guardarReserva();
        dd(route('pedido', ['reservaId' => $this->reservaId]));
    }

    // Guardar reserva (sin mostrar alerta)
    public function guardarReserva()
    {
        $this->validate();

        // Crear reserva en la base de datos
        $reserva = Reserva::create([
            'user_id' => Auth::id(),
            'contacto' => $this->contacto,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'personas' => $this->personas,
            'estado' => 'confirmada',
        ]);

        // Guardar el ID de la reserva
        $this->reservaId = $reserva->id;

        // Resetear campos
        $this->reset(['fecha', 'hora', 'personas', 'contacto', 'comentarios']);
    }

    // Guardar reserva sin pedido
    public function guardar()
    {
        $this->guardarReserva();

        // Registrar actividad reciente SOLO para reservas sin pedido
        ActividadReciente::create([
            'tipo'          => 'creacion',
            'descripcion'   => "Reserva realizada para el {$this->fecha} a las {$this->hora}",
            'entidad_type'  => \App\Models\Reserva::class,
            'entidad_id'    => $this->reservaId,
        ]);
        
        // Cerrar modal del formulario
        $this->cerrar();

        // Mostrar alerta solo si no hay pedido
        $this->dispatch('reservaExitosa', 'Reserva realizada con éxito');
    }

    public function render()
    {
        return view('livewire.componentes.restaurante-component.reservar-form');
    }
}
