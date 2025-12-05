<div class="relative">

    <!-- CONTENEDOR GLOBAL DEL CHAT -->
    <div class="fixed bottom-6 right-6 z-50">

        <!-- BOTÓN ABRIR (cuando está cerrado O minimizado) -->
        @if(!$isOpen || $isMinimized)
            <button 
                wire:click="abrirChat"
                class="bg-[#c9a961] text-black w-14 h-14 rounded-full shadow-xl 
                    flex items-center justify-center text-3xl font-bold 
                    hover:scale-110 transition-transform duration-200">
                💬
            </button>
        @endif

        <!-- CUADRO DEL CHAT (solo cuando está abierto Y no minimizado) -->
        @if($isOpen && !$isMinimized)
            <div class="w-80 md:w-96 bg-[#0d0d0d] text-white border border-[#2a2a2a] rounded-2xl shadow-2xl flex flex-col overflow-hidden animate-fadeIn">

                <!-- HEADER -->
                <div class="bg-[#c9a961] text-black px-4 py-3 flex justify-between items-center">
                    <span class="font-bold text-lg">Asistente IA</span>
                    <div class="flex gap-3 text-xl">
                        <button wire:click="$set('isMinimized', true)" class="hover:text-gray-700 transition">−</button>
                        <button wire:click="$set('isOpen', false)" class="hover:text-gray-700 transition">&times;</button>
                    </div>
                </div>
                    <div class="flex flex-col h-[500px]">

                        <!-- MENSAJES -->
                        <div class="flex-1 overflow-y-auto p-4 space-y-3 scrollbar-thin scrollbar-thumb-[#444] scrollbar-track-[#111]" 
                             wire:ignore.self
                             x-data 
                             x-init="$el.scrollTop = $el.scrollHeight"
                             x-on:messages-updated.window="setTimeout(() => $el.scrollTop = $el.scrollHeight, 100)">
                            
                            @if(count($mensajes) === 0)
                                <div class="flex items-center justify-center h-full text-gray-500 text-sm text-center px-4">
                                    <p>¡Hola! Soy tu asistente virtual.<br>¿En qué puedo ayudarte hoy?</p>
                                </div>
                            @endif

                            @foreach ($mensajes as $msg)
                                <div class="w-full flex {{ $msg['tipo']=='usuario' ? 'justify-end' : 'justify-start' }}">
                                    <div class="{{ $msg['tipo']=='usuario' 
                                                ? 'bg-[#c9a961] text-black rounded-2xl rounded-br-sm' 
                                                : 'bg-[#1a1a1a] text-gray-200 border border-[#333] rounded-2xl rounded-bl-sm' }} 
                                            px-4 py-2.5 max-w-[80%] shadow-md break-words">
                                        <div class="text-sm leading-relaxed">
                                            {!! nl2br(e($msg['texto'])) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- PREGUNTAS FRECUENTES -->
                        @if(count($frecuentes) > 0)
                            <div class="px-3 py-2 border-t border-[#222]">
                                <div class="flex gap-2 overflow-x-auto scrollbar-none pb-1">
                                    @foreach($frecuentes as $f)
                                        <button 
                                            wire:click="enviarPregunta('{{ addslashes($f) }}')" 
                                            class="bg-[#1a1a1a] px-3 py-1.5 text-xs rounded-lg 
                                                border border-[#333] whitespace-nowrap hover:bg-[#c9a961] 
                                                hover:text-black hover:border-[#c9a961] transition-all duration-200 shadow-sm">
                                            {{ $f }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- INPUT -->
                        <form wire:submit.prevent="enviarPregunta" class="p-3 border-t border-[#222]">
                            <div class="flex gap-2">
                                <input 
                                    wire:model="pregunta"
                                    type="text"
                                    class="flex-1 bg-[#111] border border-[#333] text-white px-3 py-2.5 rounded-xl placeholder-gray-500
                                        focus:ring-2 focus:ring-[#c9a961] focus:border-[#c9a961] outline-none transition text-sm"
                                    placeholder="Escribe tu pregunta..."
                                    autocomplete="off"
                                >
                                <button type="submit"
                                    class="bg-[#c9a961] text-black px-4 py-2.5 rounded-xl hover:bg-[#b29154] 
                                        transition-all duration-200 shadow-md hover:shadow-lg flex items-center justify-center
                                        disabled:opacity-50 disabled:cursor-not-allowed"
                                    wire:loading.attr="disabled">
                                    <span wire:loading.remove>➤</span>
                                    <span wire:loading>
                                        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
            </div>
        @endif
    </div>
</div>