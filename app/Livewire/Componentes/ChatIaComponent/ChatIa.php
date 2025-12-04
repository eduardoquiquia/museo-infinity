<?php

namespace App\Livewire\Componentes\ChatIaComponent;

use Livewire\Component;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ChatIa extends Component
{
    public $isOpen = false;
    public $isMinimized = false;
    public $mensajes = [];
    public $pregunta = '';
    public $entityType;
    public $entityId;
    public $frecuentes = [];
    public $cantidadActividad = 10;

    public function mount($entityType, $entityId)
    {
        $this->entityType = $entityType;
        $this->entityId = $entityId;

        switch ($entityType) {
            case 'exhibicion':
                $this->frecuentes = [
                    '¿Qué edad tiene esta exhibición?',
                    '¿Qué especies se muestran?',
                    '¿Dónde se encontraron los fósiles?'
                ];
                break;
            case 'sala':
                $this->frecuentes = [
                    '¿Cuánto dura la sala virtual?',
                    '¿Qué nivel de experiencia se requiere?'
                ];
                break;
            case 'plato':
                $this->frecuentes = [
                    '¿Qué ingredientes tiene?',
                    '¿Es apto para alérgicos?'
                ];
                break;
        }
    }

    public function enviarPregunta($pregunta = null)
    {
        $preguntaUsuario = $pregunta ?? $this->pregunta;
        if (!$preguntaUsuario) return;

        $this->mensajes[] = ['tipo' => 'usuario', 'texto' => $preguntaUsuario];
        $this->pregunta = '';

        $contexto = $this->getContextoEntidad();
        $respuestaIA = $this->consultarOllama($preguntaUsuario, $contexto);

        $this->mensajes[] = ['tipo' => 'ia', 'texto' => $respuestaIA];
    }

    protected function getContextoEntidad()
    {   
        if ($this->entityType === 'dashboard') {
            // Estadísticas generales
            $usuarios = \App\Models\User::count();
            $exhibiciones = \App\Models\Exhibicion::where('estado', 'Publicado')->count();
            $reservas = \App\Models\Reserva::whereMonth('created_at', now()->month)->count();
            $entradas = \App\Models\Entrada::whereMonth('created_at', now()->month)->count();
            $eventos = \App\Models\Evento::where('estado', 'activo')->count();
            $ingresos = \App\Models\Entrada::whereMonth('created_at', now()->month)->sum('precio');

            // Actividad reciente (últimas $cantidadActividad acciones registradas)
            $actividad = \App\Models\ActividadReciente::latest()
                    ->take($this->cantidadActividad)
                    ->pluck('descripcion')
                    ->toArray();

            // Construir contexto final
            $contexto = "Dashboard - Estadísticas generales:\n";
            $contexto .= "Usuarios totales: $usuarios\n";
            $contexto .= "Exhibiciones activas: $exhibiciones\n";
            $contexto .= "Reservas del mes: $reservas\n";
            $contexto .= "Entradas vendidas: $entradas\n";
            $contexto .= "Eventos programados: $eventos\n";
            $contexto .= "Ingresos del mes: $ingresos\n\n";
            $contexto .= "Actividad reciente:\n- " . implode("\n- ", $actividad);

            return $contexto;
        }

        // Mantener el contexto de las otras entidades
        switch ($this->entityType) {
            case 'exhibicion':
                $exhibicion = \App\Models\Exhibicion::find($this->entityId);
                return $exhibicion ? "Título: {$exhibicion->titulo}\nDescripción: {$exhibicion->descripcion}\nDetalles: {$exhibicion->descripcion_detallada}" : '';
            case 'sala':
                $sala = \App\Models\SalaVirtual::find($this->entityId);
                return $sala ? "Título: {$sala->titulo}\nSubtítulo: {$sala->subtitulo}\nDescripción: {$sala->descripcion}" : '';
            case 'plato':
                $plato = \App\Models\Plato::find($this->entityId);
                return $plato ? "Nombre: {$plato->nombre}\nDescripción: {$plato->descripcion}\nCategoría: {$plato->categoria}" : '';
        }

        return '';
    }

    protected function consultarOllama($pregunta, $contexto)
    {
        // Validar y sanitizar inputs
        $pregunta = trim($pregunta);
        $contexto = strip_tags($contexto);
        
        // Usar proceso seguro
        $prompt = "Contexto:\n{$contexto}\n\nPregunta:\n{$pregunta}";
        $process = new Process(['ollama', 'run', 'llama2', $prompt]);
        
        $process->setTimeout(30);
        
        try {
            $process->run();
            return trim($process->getOutput()) ?: 'Lo siento, no tengo información sobre eso.';
        } catch (ProcessFailedException $e) {
            return 'Error al procesar tu solicitud.';
        }
    }
    
    public function clearChat()
    {
        $this->mensajes = [];
        $this->saveHistory();
    }

    public function closeChat()
    {
        $this->isOpen = false;
        $this->isMinimized = false;
        session()->put('chat_open', false);
        session()->put('chat_minimized', false);
    }

    protected function saveHistory()
    {
        // Limitar historial a últimos 50 mensajes para no sobrecargar sesión
        $historial = array_slice($this->mensajes, -50);
        session()->put('chat_history', $historial);
    }

    public function render()
    {
        return view('livewire.componentes.chat-ia-component.chat-ia');
    }
}
