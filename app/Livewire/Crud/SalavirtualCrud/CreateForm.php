<?php

namespace App\Livewire\Crud\SalavirtualCrud;

use App\Models\SalaVirtual;
use Livewire\Component;

class CreateForm extends Component
{
    public $open = false;
    public $titulo, $subtitulo, $categoria, $nivel_experiencia, $salas_incluidas, $imagen_principal, $imagen_360, $descripcion, $highlights;
    public $estado = 'activo';

    protected $listeners = ['abrir-modal-crear-sala' => 'openModal'];

    protected $rules = [
        'titulo'            => 'required|string|max:255',
        'subtitulo'         => 'required|string|max:255',
        'categoria'         => 'required|in:Dinosaurios,Mamiferos Extintos,Arte Rupestre,Herramientas Antiguas',
        'nivel_experiencia' => 'required|in:Básico,Intermedio,Avanzado',
        'salas_incluidas'   => 'required|string|max:255',
        'imagen_principal'  => 'required|string|max:255',
        'imagen_360'        => 'nullable|string|max:255',
        'descripcion'       => 'required|string',
        'highlights'        => 'required|array',
        'estado'            => 'required|in:activo,inactivo',
    ];

    public function openModal()
    {
        $this->open = true;
    }

    public function cerrarModal()
    {
        $this->open = false;
    }

    public function crearSala()
    {
        $this->validate();

        SalaVirtual::create([
            'titulo' => $this->titulo,
            'subtitulo' => $this->subtitulo,
            'categoria' => $this->categoria,
            'nivel_experiencia' => $this->nivel_experiencia,
            'salas_incluidas' => $this->salas_incluidas,
            'imagen_principal' => $this->imagen_principal,
            'imagen_360' => $this->imagen_360,
            'descripcion' => $this->descripcion,
            'highlights' => json_encode($this->highlights),
            'estado' => $this->estado,
        ]);

        $this->reset(['titulo', 'subtitulo', 'categoria', 'nivel_experiencia', 'salas_incluidas', 'imagen_principal', 'imagen_360', 'descripcion', 'highlights']);
        $this->estado = 'activo';
        $this->open = false;

        $this->dispatch('salaCreada');
    }

    public function render()
    {
        return view('livewire.crud.salavirtual-crud.create-form');
    }
}
