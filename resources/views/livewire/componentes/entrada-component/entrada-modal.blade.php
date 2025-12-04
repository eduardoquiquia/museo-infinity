@if($open)
<div 
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
    wire:click="cerrar"   {{-- clic fuera del modal --}}
>
    <!-- Caja -->
    <div 
        class="relative bg-[#0f0d0d] p-6 rounded-lg border border-[#2a2626] w-full max-w-md"
        wire:click.stop     {{-- evita que el clic cierre el modal cuando haces clic adentro --}}
    >
        <!-- Cerrar -->
        <button wire:click="cerrar"
            class="absolute top-4 right-4 text-gray-300 hover:text-white text-xl">
            ✕
        </button>

        <!-- Título -->
        <h2 class="text-2xl font-semibold mb-1">
            {{ $modo === 'evento' ? 'Comprar entrada para evento' : 'Comprar entrada presencial' }}
        </h2>

        <!-- Info del evento -->
        @if($modo === 'evento' && $evento)
            <p class="text-gray-400 mb-4">
                Evento: <strong>{{ $evento->nombre }}</strong>
            </p>
        @endif

        <form wire:submit.prevent="guardar">

            {{-- FECHA --}}
            <label class="block mb-1 text-sm font-medium">Fecha de Visita</label>
            <input type="date" wire:model="fecha_visita"
                class="w-full mb-4 px-3 py-2 rounded bg-[#141212] text-gray-300" required>

            {{-- TIPO --}}
            <label class="block mb-1 text-sm font-medium">Tipo de Entrada</label>

            <select wire:model="tipo"
                @disabled($modo === 'evento')
                class="w-full px-3 py-2 rounded bg-[#141212] text-gray-300 mb-4">

                @if($modo === 'evento' && $evento)
                    <option value="General">
                        General - S/{{ number_format($evento->precio, 2) }}
                    </option>
                @else
                    <option value="General">General - S/ 15.00</option>
                    <option value="Adulto mayor">Adulto mayor - S/ 10.00</option>
                    <option value="Estudiante">Estudiante - S/ 8.00</option>
                    <option value="Niño">Niño - S/ 5.00</option>
                @endif

            </select>

            {{-- CANTIDAD --}}
            <label class="block mb-1 text-sm font-medium">Cantidad</label>
            <input type="number" wire:model="cantidad" min="1"
                class="w-full mb-4 px-3 py-2 rounded bg-[#141212] text-gray-300">

            {{-- TOTAL --}}
            <div class="bg-[#fff9e6] text-black px-4 py-4 rounded flex justify-between text-lg font-semibold mb-5">
                <span>Total a pagar:</span>
                <span>
                    @php
                        if ($modo === 'evento' && $evento) {
                            $precio = $evento->precio;
                        } else {
                            $tipos = [
                                'General'       => 15,
                                'Adulto mayor'  => 10,
                                'Estudiante'    => 8,
                                'Niño'          => 5,
                            ];
                            $precio = $tipos[$tipo] ?? 0;
                        }
                    @endphp
                    S/{{ number_format($precio * $cantidad, 2) }}
                </span>
            </div>

            <button 
                type="submit"
                class="w-full bg-yellow-600 hover:bg-yellow-500 text-black font-semibold py-2 rounded">
                Pagar
            </button>

        </form>
    </div>
</div>
@endif
