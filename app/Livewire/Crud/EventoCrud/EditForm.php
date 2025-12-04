<?php

namespace App\Livewire\Crud\EventoCrud;

use App\Models\Evento;
use Livewire\Component;

class EditForm extends Component
{
    public $open = false;
    public $eventoId;
    public $nombre, $descripcion, $fecha, $hora, $ubicacion, $categoria, $precio, $capacidad, $imagen_principal, $estado;

    protected $listeners = ['abrirModalEditar' => 'cargarEvento'];

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

    public function cargarEvento($id)
    {
        $evento = Evento::findOrFail($id);

        $this->eventoId = $evento->id;
        $this->nombre = $evento->nombre; 
        $this->descripcion = $evento->descripcion;
        $this->fecha = $evento->fecha;
        $this->hora = $evento->hora;
        $this->ubicacion = $evento->ubicacion;
        $this->categoria = $evento->categoria;
        $this->precio = $evento->precio;
        $this->capacidad = $evento->capacidad;
        $this->imagen_principal = $evento->imagen_principal;
        $this->estado = $evento->estado;

        $this->open = true;
    }

    public function actualizar()
    {
        $this->validate();

        $evento = Evento::findOrFail($this->eventoId);

        $evento->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'ubicacion' => $this->ubicacion,
            'categoria' => $this->categoria,
            'precio' => $this->precio,
            'capacidad' => $this->capacidad,
            'imagen_principal' => $this->imagen_principal,
            'estado' => $this->estado
        ]);

        // Cerrar modal
        $this->open = false;

        // Avisar al listado que se recargue
        $this->dispatch('eventoActualizado');
    }

    public function render()
    {
        return view('livewire.crud.evento-crud.edit-form');
    }
}
