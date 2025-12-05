<?php

namespace App\Livewire\Componentes\AdminComponent;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DashboardSection extends Component
{
    public $usuarios;
    public $exhibiciones;
    public $eventos;
    public $reservas;
    public $tickets;
    public $ingresos;

    public function mount()
    {
        // Llamamos a los procedimientos y guardamos los resultados
        $this->usuarios = DB::select('CALL UsuariosTotales()')[0];
        $this->exhibiciones = DB::select('CALL ExhibicionesActivas()')[0];
        $this->eventos = DB::select('CALL EventosProgramados()')[0];
        $this->reservas = DB::select('CALL ReservasDelMes()')[0];
        $this->tickets = DB::select('CALL TicketsVendidos()')[0];
        $this->ingresos = DB::select('CALL IngresosDelMes()')[0];

    }

    public function render()
    {
        return view('livewire.componentes.admin-component.dashboard-section');
    }
}
