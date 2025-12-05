<?php

namespace App\Livewire\Componentes\ChatIaComponent;

use Livewire\Component;

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

    public function abrirChat()
    {
        $this->isOpen = true;
        $this->isMinimized = false;
    }

    public function enviarPregunta($pregunta = null)
    {
        // Si viene pregunta como parámetro, usarla, sino usar la del input
        $preguntaUsuario = $pregunta ?? $this->pregunta;
        
        // Limpiar espacios en blanco
        $preguntaUsuario = trim($preguntaUsuario);
        
        if (!$preguntaUsuario) return;

        // Agregar mensaje del usuario
        $this->mensajes[] = ['tipo' => 'usuario', 'texto' => $preguntaUsuario];
        
        // Limpiar el input y forzar reset
        $this->reset('pregunta');
        
        // Forzar actualización del componente
        $this->dispatch('messages-updated');

        // Obtener contexto y consultar IA
        $contexto = $this->getContextoEntidad();
        $respuestaIA = $this->consultarGemini($preguntaUsuario, $contexto);

        // Agregar respuesta de la IA
        $this->mensajes[] = ['tipo' => 'ia', 'texto' => $respuestaIA];
        
        // Guardar historial
        $this->saveHistory();
        
        // Actualizar scroll
        $this->dispatch('messages-updated');
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

    protected function consultarGemini($pregunta, $contexto)
    {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://generativelanguage.googleapis.com/v1beta/',
            'timeout' => 20,
        ]);

        $apiKey = env('GEMINI_API_KEY');

        try {
            $response = $client->post("models/gemini-2.5-flash:generateContent?key={$apiKey}", [
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => "Contexto:\n$contexto\n\nPregunta:\n$pregunta"]
                            ]
                        ]
                    ]
                ]
            ]);

            $json = json_decode($response->getBody(), true);

            return $json['candidates'][0]['content']['parts'][0]['text']
                ?? 'No pude generar una respuesta.';
        } catch (\Exception $e) {
            return "Error al conectar con Gemini: " . $e->getMessage();
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