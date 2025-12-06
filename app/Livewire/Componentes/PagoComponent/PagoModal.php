<?php

namespace App\Livewire\Componentes\PagoComponent;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Pago;
use App\Models\Evento;

class PagoModal extends Component
{
    public $origen;
    public $monto;
    public $detalle;
    public $fecha;
    public $cantidad = 1;

    public $mostrar = false;

    public $errorModal = null; // mensajes dentro del modal

    // Datos de tarjeta
    public $numero_tarjeta;
    public $fecha_vencimiento;
    public $cvv;

    protected $listeners = ['abrir-modal-pago' => 'cargarDatos'];

    public function cargarDatos($data)
    {
        $this->reset(['numero_tarjeta', 'fecha_vencimiento', 'cvv']);

        // Cargar datos directos
        $origenType = $data['origen_tipo'];
        $origenId   = $data['origen_id'];
        $this->monto = $data['monto'];
        $this->detalle = $data['descripcion'];
        $this->fecha     = $data['fecha'] ?? null;
        $this->cantidad  = $data['cantidad'] ?? 1;

        // Buscar origen (Entrada, Evento, Pedido, etc.)
        $this->origen = $origenType::find($origenId);
        if (!$this->origen) return;

        $this->mostrar = true;
    }

    public function procesarPago()
    {
        try {
            $response = Http::post("http://localhost:8001/api/pagos/validar", [
                'numero_tarjeta'     => $this->numero_tarjeta,
                'fecha_vencimiento'  => $this->fecha_vencimiento,
                'cvv'                => $this->cvv,
                'monto'              => $this->monto
            ]);

            $data = $response->json();

            if (!($response->ok() && $data['success'] ?? false)) {
                $this->errorModal = $data['message'] ?? 'Datos incorrectos';
                return;
            }

            // Pago aprobado
            $pago = Pago::create([
                'monto'          => $this->monto,
                'estado'         => 'aprobado',
                'transaccion_id' => $data['data']['transaccion_id'] ?? null,
                'detalle'        => $this->detalle
            ]);

            $this->origen->pago()->save($pago);

            if ($this->origen instanceof Evento) {
                $this->origen->capacidad -= 1;
                $this->origen->save();
            }

            $this->dispatch('pagoExitoso');
            $this->mostrar = false;

        } catch (\Exception $e) {
            $this->errorModal = 'Error al conectar con la API: '.$e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.componentes.pago-component.pago-modal');
    }
}
