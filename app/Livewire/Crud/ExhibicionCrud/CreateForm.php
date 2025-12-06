<?php

namespace App\Livewire\Crud\ExhibicionCrud;

use App\Models\ActividadReciente;
use App\Models\Exhibicion;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateForm extends Component
{
    public $open = false;
    public $titulo, $descripcion, $categoria, $imagen_principal, $imagen_360, $periodo, $fecha_descubrimiento, $lugar_hallazgo, $descripcion_detallada, $destacada;
    public $estado = 'Borrador';
    protected $listeners = ['abrir-modal-crear-exhibicion' => 'openModal'];

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

        $exhibicion = Exhibicion::create([
            'titulo' => $this->titulo,
            'slug' => Str::slug($this->titulo) . '-' . uniqid(),
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

        // Registrar actividad reciente
        ActividadReciente::create([
            'tipo' => 'creacion',
            'descripcion' => "La exhibicion{$exhibicion->titulo} fue creada.",
            'entidad_type' => Exhibicion::class,
            'entidad_id' => $exhibicion->id,
        ]);

        $this->reset(['titulo','descripcion','categoria','imagen_principal','imagen_360', 'periodo', 'fecha_descubrimiento', 'lugar_hallazgo', 'descripcion_detallada', 'destacada']);
        $this->estado = 'Borrador';
        $this->open = false;

        $this->dispatch('exhibicionCreado');
    }

    public function render()
    {
        return view('livewire.crud.exhibicion-crud.create-form');
    }
}
