<?php

namespace App\Livewire\Crud\PlatoCrud;

use App\Models\Plato;
use Livewire\Component;

class EditForm extends Component
{
    public $open = false;
    public $platoId;
    public $nombre, $descripcion, $categoria, $precio, $imagen_principal;
    public $estado = 'Disponible';

    protected $listeners = ['abrir-modal-editar-plato' => 'cargarPlato'];

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'categoria' => 'required|in:Entradas,Platos principales,Acompañamientos,Postres,Bebidas',
        'precio' => 'required|numeric|min:0|max:999999.99',
        'imagen_principal' => 'required|string|max:255',
        'estado' => 'required|in:Disponible,Agotado,Inactivo',
    ];

    public function cargarPlato($id)
    {
        $plato = Plato::findOrFail($id);

        $this->platoId         = $plato->id;
        $this->nombre          = $plato->nombre;
        $this->descripcion     = $plato->descripcion;
        $this->categoria       = $plato->categoria;
        $this->precio          = $plato->precio;
        $this->imagen_principal = $plato->imagen_principal;
        $this->estado          = $plato->estado;

        $this->open = true;
    }

    public function actualizar()
    {
        $this->validate();

        $plato = Plato::findOrFail($this->platoId);

        $plato->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'categoria' => $this->categoria,
            'precio' => $this->precio,
            'imagen_principal' => $this->imagen_principal,
            'estado' => $this->estado,
        ]);

        $this->open = false;

        // Notificar al listado que se recargó
        $this->dispatch('platoActualizado');
    }


    public function render()
    {
        return view('livewire.crud.plato-crud.edit-form');
    }
}
