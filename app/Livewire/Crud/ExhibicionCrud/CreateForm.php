<?php

namespace App\Livewire\Crud\ExhibicionCrud;

use App\Models\Exhibicion;
use Livewire\Component;

class CreateForm extends Component
{
    public $open = false;
    public $titulo, $descripcion, $categoria, $imagen_principal, $imagen_360, $periodo, $fecha_descubrimiento, $lugar_hallazgo, $descripcion_detallada, $destacada;
    public $estado = 'Borrador';
    protected $listeners = ['abrir-modal-crear' => 'openModal'];

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'categoria' => 'required|in:Dinosaurios,Mamiferos Extintos,Arte Rupestre,Herramientas Antiguas',
        'imagen_principal' => 'required|string',
        'imagen_360' => 'nullable|string',
        'periodo' => 'required|in:Periodo Triásico,Periodo Jurásico,Periodo Cretácico',
        'fecha_descubrimiento' => 'required|date',
        'lugar_hallazgo' => 'required|string',
        'descripcion_detallada' => 'required|string',
        'destacada' => 'required|boolean',
        'estado' => 'required|in:Publicado,Borrador,Archivado'
    ];

    public function openModal()
    {
        $this->open = true;
    }

    public function cerrarModal()
    {
        $this->open = false;
    }

    public function crearExhibicion()
    {
        $this->validate();

        Exhibicion::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'categoria' => $this->categoria,
            'imagen_principal' => $this->imagen_principal,
            'imagen_360' => $this->imagen_360,
            'periodo' => $this->periodo,
            'fecha_descubrimiento' => $this->fecha_descubrimiento,
            'lugar_hallazgo' => $this->lugar_hallazgo,
            'descripcion_detallada' => $this->descripcion_detallada,
            'destacada' => $this->destacada,
            'estado' => $this->estado
        ]);

        $this->reset(['titulo','descripcion','categoria','imagen_principal','imagen_360', 'periodo', 'fecha_descubrimiento', 'lugar_hallazgo', 'descripcion_detallada', 'destacada']);
        $this->estado = 'Borrador';
        $this->open = false;

        $this->dispatch('exhibicion-creado');
    }

    public function render()
    {
        return view('livewire.crud.exhibicion-crud.create-form');
    }
}
