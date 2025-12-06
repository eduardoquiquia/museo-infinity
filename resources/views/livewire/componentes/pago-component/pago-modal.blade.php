<div>
    @if($mostrar)
    <div class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <div class="bg-[#0d0d0d] text-white w-full max-w-lg p-6 rounded-lg shadow-lg relative">

            <!-- Cerrar -->
            <button wire:click="$set('mostrar', false)" class="absolute top-3 right-3 text-gray-300 hover:text-white text-xl">
                ×
            </button>

            <h2 class="text-xl font-bold mb-1">Información de Pago</h2>
            <p class="text-sm text-gray-300 mb-6">Completa los detalles de tu tarjeta</p>

            <!-- Numero de Tarjeta -->
            <label class="block text-sm font-semibold mb-1">Número de Tarjeta</label>
            <input 
                type="text"
                maxlength="19"
                wire:model="numero_tarjeta"
                class="w-full bg-[#1a1a1a] text-white px-4 py-3 rounded mb-4"
                placeholder="1234 5678 9012 3456">

            <div class="flex gap-3">
                <!-- Expiración -->
                <div class="w-1/2">
                    <label class="block text-sm font-semibold mb-1">Fecha de Expiración</label>
                    <input 
                        type="text"
                        maxlength="5"
                        wire:model="fecha_vencimiento"
                        class="w-full bg-[#1a1a1a] text-white px-4 py-3 rounded mb-4"
                        placeholder="MM/YY">
                </div>

                <!-- CVV -->
                <div class="w-1/2">
                    <label class="block text-sm font-semibold mb-1">CVV</label>
                    <input 
                        type="text"
                        maxlength="3"
                        wire:model="cvv"
                        class="w-full bg-[#1a1a1a] text-white px-4 py-3 rounded mb-4"
                        placeholder="123">
                </div>
            </div>

            {{-- ⚠️ Mensaje de error dentro del modal --}}
            @if ($errorModal)
                <p class="text-red-500 text-sm mb-3 -mt-2">
                    {{ $errorModal }}
                </p>
            @endif

            <!-- Resumen -->
            <div class="border border-gray-700 rounded p-4 mb-4 mt-2 text-sm">
                <div class="flex justify-between mb-1">
                    <span>Detalle:</span>
                    <span class="font-semibold">{{ $detalle }}</span>
                </div>

                <div class="flex justify-between mb-1">
                    <span>Fecha:</span>
                    <span class="font-semibold">{{ $fecha }}</span>
                </div>

                <div class="flex justify-between mb-1">
                    <span>Cantidad:</span>
                    <span class="font-semibold">{{ $cantidad }}x</span>
                </div>

                <div class="border-t border-gray-700 mt-2 pt-2 flex justify-between text-base">
                    <span>Total:</span>
                    <span class="text-yellow-500 font-bold">S/ {{ number_format($monto, 2) }}</span>
                </div>
            </div>

            <!-- Botones -->
            <div class="grid grid-cols-2 gap-3">
                <button 
                    wire:click="$set('mostrar', false)"
                    class="bg-transparent border border-gray-600 py-2 rounded hover:bg-gray-800">
                    Atrás
                </button>

                <button 
                    wire:click="procesarPago"
                    class="bg-yellow-600 hover:bg-yellow-500 text-black font-semibold py-2 rounded">
                    Pagar
                </button>
            </div>

        </div>
    </div>
    @endif
</div>
