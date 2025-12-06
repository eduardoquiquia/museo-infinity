<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($exhibiciones as $exhibicion)
        <div class="bg-neutral-900 rounded-xl shadow-md overflow-hidden border border-neutral-800 hover:border-neutral-700 transition">

            {{-- Imagen --}}
            <div class="relative h-52 w-full overflow-hidden">
                <img 
                    src="{{ $exhibicion->imagen_principal }}" 
                    alt="Imagen de la exhibición {{ $exhibicion->titulo }}"
                    class="object-cover w-full h-full transform hover:scale-105 transition duration-300"
                >

                {{-- Categoría --}}
                <span class="absolute top-3 left-3 bg-yellow-600 text-black text-xs font-semibold px-3 py-1 rounded shadow">
                    <i class="fas fa-layer-group mr-1"></i>
                    {{ ucfirst($exhibicion->categoria) }}
                </span>

                {{-- Destacada --}}
                @if($exhibicion->destacada)
                    <span class="absolute top-3 right-3 bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded shadow">
                        <i class="fas fa-star mr-1"></i> Destacada
                    </span>
                @endif
            </div>

            {{-- Contenido --}}
            <div class="p-4 text-neutral-200">

                {{-- Título --}}
                <h3 class="text-lg font-semibold mb-1">{{ $exhibicion->titulo }}</h3>

                {{-- Descripción corta --}}
                <p class="text-neutral-400 text-sm mb-3 line-clamp-2">
                    {{ $exhibicion->descripcion }}
                </p>

                {{-- Información adicional --}}
                <div class="text-neutral-400 text-sm space-y-1 mb-4">

                    <div>
                        <i class="fas fa-calendar-day mr-2"></i>
                        <span class="font-medium">Descubrimiento:</span>
                        {{ \Carbon\Carbon::parse($exhibicion->fecha_descubrimiento)->format('d/m/Y') }}
                    </div>

                    <div>
                        <i class="fas fa-landmark mr-2"></i>
                        <span class="font-medium">Periodo:</span>
                        {{ $exhibicion->periodo }}
                    </div>

                    <div>
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span class="font-medium">Lugar:</span>
                        {{ $exhibicion->lugar_hallazgo }}
                    </div>

                    <div>
                        <i class="fas fa-check-circle mr-2"></i>
                        <span class="font-medium">Estado:</span>
                        <span class="font-semibold 
                            @if($exhibicion->estado === 'Publicado') text-green-400
                            @elseif($exhibicion->estado === 'Borrador') text-yellow-400
                            @else text-red-400 @endif">
                            {{ $exhibicion->estado }}
                        </span>
                    </div>

                </div>

                {{-- Descripción detallada (colapsable) --}}
                @if($exhibicion->descripcion_detallada)
                <details class="mb-4 group">
                    <summary class="cursor-pointer text-yellow-500 hover:text-yellow-400 font-medium text-sm">
                        <i class="fas fa-info-circle mr-1"></i> Ver más detalles
                    </summary>

                    <p class="text-neutral-400 text-sm mt-2 p-3 bg-neutral-800 rounded-lg border border-neutral-700">
                        {{ $exhibicion->descripcion_detallada }}
                    </p>
                </details>
                @endif

                {{-- Botones --}}
                <div class="flex justify-end items-center gap-3 mt-4">

                    {{-- Editar --}}
                    <button 
                        wire:click="editar({{ $exhibicion->id }})"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg shadow transition"
                        title="Editar exhibición"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                        </svg>
                    </button>

                    {{-- Eliminar --}}
                    <button 
                        wire:click="deleteExhibicion({{ $exhibicion->id }})"
                        onclick="return confirm('¿Estás seguro de eliminar esta exhibición?')"
                        class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-lg shadow transition"
                        title="Eliminar exhibición"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                </div>

            </div>
        </div>

    @empty
        <p class="text-neutral-400 text-center col-span-full">No hay exhibiciones registradas.</p>
    @endforelse
</div>
