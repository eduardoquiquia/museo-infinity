<div>
    @if($mostrar)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        
        <div class="bg-[#0d0d0d] text-white w-full max-w-md p-6 rounded-lg shadow-lg border border-[#262626] relative">
            
            <!-- Botón Cerrar -->
            <button 
                wire:click="cerrar"
                class="absolute top-3 right-3 text-gray-300 hover:text-white text-2xl"
            >
                ×
            </button>

            <!-- Ícono -->
            <div class="flex justify-center mb-4">
                @if($tipo === 'success')
                    <div class="w-16 h-16 bg-green-600/20 border border-green-600 rounded-full flex items-center justify-center">
                        <span class="text-green-500 text-4xl">✓</span>
                    </div>
                @else
                    <div class="w-16 h-16 bg-red-600/20 border border-red-600 rounded-full flex items-center justify-center">
                        <span class="text-red-500 text-4xl">✕</span>
                    </div>
                @endif
            </div>

            <!-- Título -->
            <h2 class="text-xl font-bold text-center mb-2
                @if($tipo === 'success') text-green-500 @else text-red-500 @endif">
                {{ $mensaje }}
            </h2>

            <!-- Detalle -->
            @if($detalle)
            <p class="text-gray-300 text-center mb-4">{{ $detalle }}</p>
            @endif

            <!-- Botón Aceptar -->
            <div class="flex justify-center">
                <button 
                    wire:click="cerrar"
                    class="@if($tipo === 'success')
                                bg-green-600 hover:bg-green-500
                            @else
                                bg-red-600 hover:bg-red-500
                            @endif
                            text-black font-semibold px-6 py-2 rounded-lg transition w-full text-center
                    ">
                    Aceptar
                </button>
            </div>

        </div>

    </div>
    @endif
</div>
