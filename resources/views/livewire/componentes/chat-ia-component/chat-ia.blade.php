<div>
    <button wire:click="abrirModal" class="bg-blue-600 text-white px-4 py-2 rounded">Chat</button>

    @if($modalOpen)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg w-full max-w-lg p-4 relative">
                <button wire:click="cerrarModal" class="absolute top-2 right-2 text-gray-500">&times;</button>

                <h2 class="text-lg font-bold mb-2">Asistente IA</h2>

                <div class="h-64 overflow-y-auto border p-2 mb-2">
                    @foreach($mensajes as $msg)
                        <div class="{{ $msg['tipo']=='usuario' ? 'text-right text-blue-600' : 'text-left text-gray-800' }}">
                            {{ $msg['texto'] }}
                        </div>
                    @endforeach
                </div>

                <div class="flex gap-2 mb-2">
                    @foreach($frecuentes as $f)
                        <button wire:click="enviarPregunta('{{ $f }}')" class="bg-gray-200 px-2 py-1 rounded text-sm">
                            {{ $f }}
                        </button>
                    @endforeach
                </div>

                <div class="flex gap-2">
                    <input type="text" wire:model.defer="pregunta" class="flex-1 border p-2 rounded" placeholder="Escribe tu pregunta">
                    <button wire:click="enviarPregunta" class="bg-blue-600 text-white px-4 py-2 rounded">Enviar</button>
                </div>
            </div>
        </div>
    @endif
</div>
