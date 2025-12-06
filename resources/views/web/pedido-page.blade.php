<x-app-layout title="Pedidos">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Título --}}
        <h1 class="text-2xl font-bold mb-4">Pedido para la reserva #{{ $reserva->id }}</h1>
        <p>Fecha: {{ $reserva->fecha }} | Hora: {{ $reserva->hora }} | Personas: {{ $reserva->personas }}</p>

        {{-- Platos disponibles --}}
        <h2 class="text-xl font-semibold mt-6 mb-4">Platos disponibles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($platos as $plato)
                <div class="bg-[#141212] rounded-lg overflow-hidden border border-[#2a2626] hover:border-yellow-600 transition-colors">
                    @if($plato->imagen_principal)
                        <img src="{{ asset('storage/' . $plato->imagen_principal) }}" 
                             alt="{{ $plato->nombre }}" 
                             class="w-full h-40 object-cover">
                    @else
                        <div class="w-full h-40 bg-gray-800 flex items-center justify-center">
                            <span class="text-gray-400">Sin imagen</span>
                        </div>
                    @endif

                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <h4 class="font-semibold text-lg">{{ $plato->nombre }}</h4>
                            <span class="text-yellow-500 font-bold">{{ number_format($plato->precio, 2) }} S/</span>
                        </div>
                        <p class="text-gray-400 text-sm mb-3">{{ $plato->descripcion }}</p>
                        <div class="flex justify-between items-center">
                            <span class="px-2 py-1 bg-gray-800 rounded text-xs">{{ $plato->categoria }}</span>
                            <form method="POST" action="{{ route('pedido.agregar') }}">
                                @csrf
                                <input type="hidden" name="reserva_id" value="{{ $reserva->id }}">
                                <input type="hidden" name="plato_id" value="{{ $plato->id }}">
                                <button type="submit" 
                                        class="px-4 py-2 bg-yellow-600 hover:bg-yellow-500 text-black font-semibold rounded text-sm">
                                    Añadir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Carrito --}}
        <h2 class="text-xl font-semibold mt-8 mb-4">Carrito</h2>
        @if(count($carrito) > 0)
            <div class="bg-[#141212] p-4 rounded-lg border border-[#2a2626]">
                @foreach($carrito as $item)
                    <div class="flex justify-between items-center mb-2">
                        <span>{{ $item['nombre'] }} x {{ $item['cantidad'] }}</span>
                        <span>S/.{{ number_format($item['subtotal'], 2) }}</span>
                    </div>
                @endforeach
                <hr class="my-2 border-gray-600">
                <div class="flex justify-between font-bold">
                    <span>Total:</span>
                    <span>S/.{{ number_format($total, 2) }}</span>
                </div>

                {{-- Botón de Pago --}}
                <button type="button"
                        onclick="Livewire.emit('abrir-modal-pago', {
                            origen_tipo: '{{ \App\Models\Pedido::class }}',
                            origen_id: '{{ $pedido->id }}',
                            monto: '{{ $total }}',
                            descripcion: 'Pedido del restaurante',
                            fecha: '{{ now()->toDateString() }}',
                            cantidad: 1
                        })"
                        class="mt-4 w-full bg-yellow-600 hover:bg-yellow-500 text-black font-semibold py-2 rounded">
                    Ir a Pagar
                </button>
            </div>
        @else
            <p class="text-gray-400">Aún no has agregado platos al carrito.</p>
        @endif

    </div>

</x-app-layout>
