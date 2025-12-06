<div>
    @if($open)
    <div 
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
        wire:click="cerrar" {{-- clic fuera del modal --}}
    >
        <!-- Caja del Modal -->
        <div 
            class="relative bg-[#0f0d0d] p-6 rounded-lg border border-[#2a2626] w-full max-w-md"
            wire:click.stop {{-- evita que clic dentro cierre --}}
        >
            <!-- Cerrar -->
            <button wire:click="cerrar"
                class="absolute top-4 right-4 text-gray-300 hover:text-white text-xl">
                ✕
            </button>

            <!-- Título -->
            <h2 class="text-2xl font-semibold mb-4">
                Reservar Mesa
            </h2>

            <p class="text-gray-400 mb-6">
                Completa los detalles de tu reserva en nuestro restaurante
            </p>

            <!-- Formulario -->
            <form wire:submit.prevent="guardar">

                {{-- FECHA --}}
                <label class="block mb-1 text-sm font-medium">Fecha</label>
                <input type="date" wire:model="fecha"
                    class="w-full mb-4 px-3 py-2 rounded bg-[#141212] text-gray-300" required>

                {{-- HORA --}}
                <label class="block mb-1 text-sm font-medium">Hora</label>
                <select wire:model="hora"
                    class="w-full mb-4 px-3 py-2 rounded bg-[#141212] text-gray-300" required>
                    <option value="" disabled selected>Seleccionar hora</option>
                    @for($h=12; $h<=22; $h++)
                        <option value="{{ sprintf('%02d:00', $h) }}">{{ sprintf('%02d:00', $h) }}</option>
                        <option value="{{ sprintf('%02d:30', $h) }}">{{ sprintf('%02d:30', $h) }}</option>
                    @endfor
                </select>

                {{-- PERSONAS --}}
                <label class="block mb-1 text-sm font-medium">Número de Personas</label>
                <select wire:model="personas"
                    class="w-full mb-4 px-3 py-2 rounded bg-[#141212] text-gray-300">
                    @for($p=1; $p<=10; $p++)
                        <option value="{{ $p }}">{{ $p }} {{ $p === 1 ? 'persona' : 'personas' }}</option>
                    @endfor
                </select>

                {{-- TELÉFONO --}}
                <label class="block mb-1 text-sm font-medium">Teléfono de Contacto</label>
                <input type="text" wire:model="contacto" placeholder="+51 950 177 464"
                    class="w-full mb-4 px-3 py-2 rounded bg-[#141212] text-gray-300" required>

                {{-- COMENTARIOS --}}
                <label class="block mb-1 text-sm font-medium">Comentarios Especiales (Opcional)</label>
                <textarea wire:model="comentarios" placeholder="Alergias, preferencias de mesa, etc."
                    class="w-full mb-4 px-3 py-2 rounded bg-[#141212] text-gray-300"></textarea>

                {{-- POLÍTICA --}}
                <div class="bg-[#c9a961] text-black px-4 py-3 rounded mb-4 text-sm">
                    <strong>Política de cancelación:</strong> Puedes cancelar tu reserva sin costo hasta 24 horas antes de la fecha programada.
                </div>

                {{-- BOTÓN RESERVA --}}
                <button type="submit"
                    class="w-full bg-yellow-600 hover:bg-yellow-500 text-black font-semibold py-2 rounded mb-3">
                    Confirmar Reserva
                </button>

                {{-- BOTÓN PEDIDO
                <button type="button" wire:click="iniciarPedido"
                    class="w-full bg-gray-800 hover:bg-gray-700 text-gray-300 font-semibold py-2 rounded">
                    ¿Desea hacer un pedido?
                </button> --}}

            </form>
        </div>
    </div>
    @endif
</div>
