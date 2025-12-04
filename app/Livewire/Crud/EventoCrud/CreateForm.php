<?php

namespace App\Livewire\Crud\EventoCrud;

use App\Models\Evento;
use Livewire\Component;

class CreateForm extends Component
{
    public $open = false;
    public $nombre, $descripcion, $fecha, $hora, $ubicacion, $categoria, $precio, $capacidad, $imagen_principal;
    public $estado = 'activo';

    protected $listeners = ['abrir-modal-crear' => 'openModal'];

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fecha' => 'required|date',
        'hora' => 'required|string',
        'ubicacion' => 'required|in:Sala principal,Auditorio,Jardin,Sala exposiciones',
        'categoria' => 'required|in:Concierto,Exposicion,Taller,Conferencia',
        'precio' => 'required|numeric|min:0',
        'capacidad' => 'required|integer|min:1',
        'imagen_principal' => 'required|string',
        'estado' => 'required|in:activo,inactivo,cancelado'
    ];

    public function openModal()
    {
        $this->open = true;
    }

    public function cerrarModal()
    {
        $this->open = false;
    }

    public function crearEvento()
    {
        $this->validate();

        Evento::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'ubicacion' => $this->ubicacion,
            'categoria' => $this->categoria,
            'precio' => $this->precio,
            'capacidad' => $this->capacidad,
            'imagen_principal' => $this->imagen_principal,
            'estado' => $this->estado,
        ]);

        $this->reset(['nombre','descripcion','fecha','hora','ubicacion', 'categoria', 'precio', 'capacidad', 'imagen_principal']);
        $this->estado = 'activo';
        $this->open = false;

        $this->dispatch('evento-creado');
    }

    public function render()
    {
        return view('livewire.crud.evento-crud.create-form');
    }
}
