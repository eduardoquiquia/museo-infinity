<?php

namespace App\Livewire\Componentes\PagoComponent;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Pago;
use App\Models\Evento;
use App\Models\Pedido;

class PagoModal extends Component
{
    public $origen;
    public $monto;
    public $detalle;
    public $fecha;
    public $cantidad = 1;

    public $mostrar = false;

    // Datos de tarjeta
    public $numero_tarjeta;
    public $fecha_vencimiento;
    public $cvv;

    protected $listeners = ['abrirPagoModal' => 'cargarDatos'];

    public function cargarDatos($origenType, $origenId)
    {
        $this->reset(['numero_tarjeta', 'fecha_vencimiento', 'cvv']);

        $this->origen = $origenType::find($origenId);

        if (!$this->origen) return;

        // EVENTO
        if ($this->origen instanceof Evento) {
            $this->monto = $this->origen->precio;
            $this->detalle = $this->origen->nombre;
            $this->fecha = $this->origen->fecha->format('d/m/Y');
            $this->cantidad = 1;
        }

        // PEDIDO DE RESERVA
        if ($this->origen instanceof Pedido) {
            $this->monto = $this->origen->total;
            $this->detalle = "Pedido de Reserva #" . $this->origen->id;
            $this->fecha = $this->origen->fecha_hora->format('d/m/Y H:i');
            $this->cantidad = $this->origen->detalles()->count();
        }

        $this->mostrar = true;
    }

    public function procesarPago()
    {
        // Llamada a la API
        $response = Http::post("http://localhost:8001/api/pagos/validar", [
            'numero_tarjeta'     => $this->numero_tarjeta,
            'fecha_vencimiento'  => $this->fecha_vencimiento,
            'cvv'                => $this->cvv,
            'monto'              => $this->monto
        ]);

        if (!$response->ok()) {
            $this->dispatch('error', message: 'Error al conectar con la API.');
            return;
        }

        $data = $response->json();

        // Crear Registro Pago
        $pago = Pago::create([
            'monto'          => $this->monto,
            'estado'         => $data['status'],
            'transaccion_id' => $data['transaccion_id'] ?? null,
            'detalle'        => $this->detalle
        ]);

        // Asociar con origen
        $this->origen->pago()->save($pago);

        // Si se aprobó, aplicar acciones
        if ($data['status'] === 'aprobado') {

            // Si es evento → reducir capacidad
            if ($this->origen instanceof Evento) {
                $this->origen->capacidad -= 1;
                $this->origen->save();
            }

            $this->dispatch('pagoExitoso');
            $this->mostrar = false;
            return;
        }

        // RECHAZADO
        $this->dispatch('pagoRechazado', message: $data['mensaje'] ?? 'Pago rechazado.');
    }

    public function render()
    {
        return view('livewire.componentes.pago-component.pago-modal');
    }
}
