<?php

namespace App\Livewire\Crud\SalavirtualCrud;

use App\Models\SalaVirtual;
use Livewire\Component;

class EditForm extends Component
{
    public $open = false;
    public $salaId;
    public $titulo, $subtitulo, $categoria, $nivel_experiencia, $salas_incluidas, $imagen_principal, $imagen_360, $descripcion, $highlights;
    public $estado = 'activo';

    protected $listeners = ['abrir-modal-editar-sala' => 'cargarSala'];

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'subtitulo' => 'required|string|max:255',
        'categoria' => 'required|in:Dinosaurios,Mamiferos Extintos,Arte Rupestre,Herramientas Antiguas',
        'nivel_experiencia' => 'required|in:Básico,Intermedio,Avanzado',
        'salas_incluidas' => 'required|string',
        'imagen_principal' => 'required|string|max:255',
        'imagen_360' => 'nullable|string|max:255',
        'descripcion' => 'required|string',
        'highlights' => 'required', // Será un array o JSON; se valida en procesamiento
        'estado' => 'required|in:activo,inactivo',
    ];

    public function cargarSala($id)
    {
        $sala = SalaVirtual::findOrFail($id);

        $this->salaId = $sala->id;
        $this->titulo = $sala->titulo;
        $this->subtitulo = $sala->subtitulo;
        $this->categoria = $sala->categoria;
        $this->nivel_experiencia = $sala->nivel_experiencia;
        $this->salas_incluidas = $sala->salas_incluidas;
        $this->imagen_principal = $sala->imagen_principal;
        $this->imagen_360 = $sala->imagen_360;
        $this->descripcion = $sala->descripcion;
        $this->highlights = json_encode($sala->highlights); // Para editar en textarea
        $this->estado = $sala->estado;

        $this->open = true;
    }


    public function actualizar()
    {
        $this->validate();

        $sala = SalaVirtual::findOrFail($this->salaId);

        $sala->update([
            'titulo' => $this->titulo,
            'subtitulo' => $this->subtitulo,
            'categoria' => $this->categoria,
            'nivel_experiencia' => $this->nivel_experiencia,
            'salas_incluidas' => $this->salas_incluidas,
            'imagen_principal' => $this->imagen_principal,
            'imagen_360' => $this->imagen_360,
            'descripcion' => $this->descripcion,
            'highlights' => json_decode($this->highlights, true),
            'estado' => $this->estado,
        ]);

        $this->open = false;

        $this->dispatch('salaActualizada');
    }


    public function render()
    {
        return view('livewire.crud.salavirtual-crud.edit-form');
    }
}
