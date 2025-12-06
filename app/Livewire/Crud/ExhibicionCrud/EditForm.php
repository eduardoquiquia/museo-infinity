<?php

namespace App\Livewire\Crud\ExhibicionCrud;

use App\Models\ActividadReciente;
use App\Models\Exhibicion;
use Livewire\Component;

class EditForm extends Component
{
    public $open = false;
    public $exhibicionId;
    public $titulo, $descripcion, $categoria, $imagen_principal, $imagen_360, $periodo, $fecha_descubrimiento, $lugar_hallazgo, $descripcion_detallada, $destacada, $estado;

    protected $listeners = ['abrir-modal-editar-exhibicion' => 'cargarExhibicion'];

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

    public function cargarExhibicion($id)
    {
        $exhibicion = Exhibicion::findOrFail($id);

        $this->exhibicionId = $exhibicion->id;
        $this->titulo = $exhibicion->titulo; 
        $this->descripcion = $exhibicion->descripcion;
        $this->categoria = $exhibicion->categoria;
        $this->imagen_principal = $exhibicion->imagen_principal;
        $this->imagen_360 = $exhibicion->imagen_360;
        $this->periodo = $exhibicion->periodo;
        $this->fecha_descubrimiento = $exhibicion->fecha_descubrimiento;
        $this->lugar_hallazgo = $exhibicion->lugar_hallazgo;
        $this->descripcion_detallada = $exhibicion->descripcion_detallada;
        $this->destacada = $exhibicion->destacada;
        $this->estado = $exhibicion->estado;

        $this->open = true;
    }

    public function actualizar()
    {
        $this->validate();

        $exhibicion = Exhibicion::findOrFail($this->exhibicionId);

        $exhibicion->update([
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

        // Registrar actividad reciente
        ActividadReciente::create([
            'tipo' => 'actualizacion',
            'descripcion' => "La exhibicion {$exhibicion->titulo} fue actualizada.",
            'entidad_type' => Exhibicion::class,
            'entidad_id' => $exhibicion->id,
        ]);

        // Cerrar modal
        $this->open = false;

        // Avisar al listado que se recargue
        $this->dispatch('exhibicionActualizado');
    }

    public function render()
    {
        return view('livewire.crud.exhibicion-crud.edit-form');
    }
}
