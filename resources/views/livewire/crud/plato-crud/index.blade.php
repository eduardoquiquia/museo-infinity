<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($platos as $plato)
        <div class="bg-neutral-900 rounded-xl shadow-md overflow-hidden border border-neutral-800 hover:border-neutral-700 transition">

            {{-- Imagen --}}
            <div class="relative h-52 w-full overflow-hidden">
                <img 
                    src="{{ $plato->imagen_principal }}" 
                    alt="Imagen del plato {{ $plato->nombre }}"
                    class="object-cover w-full h-full transform hover:scale-105 transition duration-300"
                >

                {{-- Categoría --}}
                <span class="absolute top-3 left-3 bg-yellow-600 text-black text-xs font-semibold px-3 py-1 rounded shadow">
                    <i class="fas fa-utensils mr-1"></i>
                    {{ ucfirst($plato->categoria) }}
                </span>
            </div>

            {{-- Contenido --}}
            <div class="p-4 text-neutral-200">

                {{-- Nombre --}}
                <h3 class="text-lg font-semibold mb-1">{{ $plato->nombre }}</h3>

                {{-- Descripción corta --}}
                <p class="text-neutral-400 text-sm mb-3 line-clamp-2">
                    {{ $plato->descripcion }}
                </p>

                {{-- Información --}}
                <div class="text-neutral-400 text-sm space-y-1 mb-4">

                    <div>
                        <i class="fas fa-dollar-sign mr-2"></i>
                        <span class="font-medium">Precio:</span>
                        S/ {{ number_format($plato->precio, 2) }}
                    </div>

                    <div>
                        <i class="fas fa-check-circle mr-2"></i>
                        <span class="font-medium">Estado:</span>
                        <span
                            class="font-semibold
                                @if($plato->estado === 'Disponible') text-green-400
                                @elseif($plato->estado === 'Agotado') text-yellow-400
                                @else text-red-400 @endif">
                            {{ $plato->estado }}
                        </span>
                    </div>

                </div>

                {{-- Acciones --}}
                <div class="flex justify-end items-center gap-3">

                    {{-- Editar --}}
                    <button 
                        wire:click="editar({{ $plato->id }})"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg shadow transition"
                        title="Editar plato"
                    >
                        <i class="fas fa-edit"></i>
                    </button>

                    {{-- Eliminar --}}
                    <button 
                        wire:click="deletePlato({{ $plato->id }})"
                        onclick="return confirm('¿Estás seguro de eliminar este plato?')"
                        class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg shadow transition"
                        title="Eliminar plato"
                    >
                        <i class="fas fa-trash"></i>
                    </button>

                </div>

            </div>
        </div>

    @empty
        <p class="text-neutral-400 text-center col-span-full">No hay platos registrados.</p>
    @endforelse
</div>

