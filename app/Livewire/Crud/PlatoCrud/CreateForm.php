<?php

namespace App\Livewire\Crud\PlatoCrud;

use App\Models\Plato;
use Livewire\Component;

class CreateForm extends Component
{
    public $open = false;
    public $nombre, $descripcion, $categoria, $precio, $imagen_principal;
    public $estado = 'Disponible';

    protected $listeners = ['abrir-modal-crear-plato' => 'openModal'];

    protected $rules = [
        'nombre'           => 'required|string|max:255',
        'descripcion'      => 'required|string',
        'categoria'        => 'required|in:Entradas,Platos principales,Acompañamientos,Postres,Bebidas',
        'precio'           => 'required|numeric|min:0',
        'imagen_principal' => 'required|string|max:255',
        'estado'           => 'required|in:Disponible,Agotado,Inactivo',
    ];


    public function openModal()
    {
        $this->open = true;
    }

    public function cerrarModal()
    {
        $this->open = false;
    }

    public function crearPlato()
    {
        $this->validate();

        Plato::create([
            'nombre'           => $this->nombre,
            'descripcion'      => $this->descripcion,
            'categoria'        => $this->categoria,
            'precio'           => $this->precio,
            'imagen_principal' => $this->imagen_principal,
            'estado'           => $this->estado,
        ]);

        $this->reset(['nombre', 'descripcion', 'categoria', 'precio', 'imagen_principal',]);
            $this->estado = 'Disponible';
            $this->open = false;

            $this->dispatch('plato-creado');
        }

    public function render()
    {
        return view('livewire.crud.plato-crud.create-form');
    }
}
