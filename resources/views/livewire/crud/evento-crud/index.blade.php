<div class="mt-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($eventos as $evento)
            <div class="bg-neutral-900 rounded-xl shadow-md overflow-hidden border border-neutral-800 hover:border-neutral-700 transition">

                {{-- Imagen --}}
                <div class="relative h-52 w-full overflow-hidden">
                    <img 
                        src="{{ $evento->imagen_principal }}" 
                        alt="Imagen del evento {{ $evento->nombre }}"
                        class="object-cover w-full h-full transform hover:scale-105 transition duration-300"
                    >

                    {{-- Categoría --}}
                    <span class="absolute top-3 left-3 bg-yellow-600 text-black text-xs font-semibold px-3 py-1 rounded shadow">
                        <i class="fas fa-layer-group mr-1"></i>
                        {{ ucfirst($evento->categoria) }}
                    </span>
                </div>

                {{-- Contenido --}}
                <div class="p-4 text-neutral-200">

                    {{-- Título --}}
                    <h3 class="text-lg font-semibold mb-1">{{ $evento->nombre }}</h3>

                    {{-- Descripción corta --}}
                    <p class="text-neutral-400 text-sm mb-3 line-clamp-2">
                        {{ $evento->descripcion }}
                    </p>

                    {{-- Información --}}
                    <div class="text-neutral-400 text-sm space-y-1 mb-4">

                        <div>
                            <i class="fas fa-calendar-day mr-2"></i>
                            <span class="font-medium">Fecha:</span>
                            {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }} — {{ $evento->hora }}
                        </div>

                        <div>
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span class="font-medium">Lugar:</span>
                            {{ $evento->ubicacion }}
                        </div>

                        <div>
                            <i class="fas fa-ticket-alt mr-2"></i>
                            <span class="font-medium">Precio:</span>
                            S/ {{ number_format($evento->precio, 2) }}
                        </div>

                        <div>
                            <i class="fas fa-users mr-2"></i>
                            <span class="font-medium">Capacidad:</span>
                            {{ $evento->capacidad }}
                        </div>

                        <div>
                            <i class="fas fa-check-circle mr-2"></i>
                            <span class="font-medium">Estado:</span>
                            <span 
                                class="font-semibold
                                    @if($evento->estado === 'activo') text-green-400
                                    @elseif($evento->estado === 'inactivo') text-yellow-400
                                    @else text-red-400 @endif">
                                {{ ucfirst($evento->estado) }}
                            </span>
                        </div>

                    </div>

                    {{-- Acciones --}}
                    <div class="flex justify-end items-center gap-3">

                        {{-- Editar --}}
                        <button 
                            wire:click="editar({{ $evento->id }})"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg shadow transition"
                            title="Editar evento"
                        >
                            <i class="fas fa-edit"></i>
                        </button>

                        {{-- Eliminar --}}
                        <button 
                            wire:click="deleteEvento({{ $evento->id }})"
                            onclick="return confirm('¿Estás seguro de eliminar este evento?')"
                            class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg shadow transition"
                            title="Eliminar evento"
                        >
                            <i class="fas fa-trash"></i>
                        </button>

                    </div>

                </div>
            </div>

        @empty
            <p class="text-neutral-400 text-center col-span-full">No hay eventos registrados.</p>
        @endforelse
    </div>
</div>

