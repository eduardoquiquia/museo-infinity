
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse ($exhibiciones as $exhibicion)
        <div class="bg-neutral-900 rounded-xl shadow-md overflow-hidden border border-neutral-800">

            {{-- Imagen --}}
            <div class="relative h-52 w-full overflow-hidden">
                <img 
                    src="{{$exhibicion->imagen_principal}}" 
                    alt="Imagen de la exhibición {{ $exhibicion->titulo }}"
                    class="object-cover w-full h-full"
                >

                {{-- Categoría --}}
                <span class="absolute top-3 left-3 bg-yellow-600 text-black text-xs font-semibold px-3 py-1 rounded">
                    {{ ucfirst($exhibicion->categoria) }}
                </span>

                {{-- Destacada --}}
                @if($exhibicion->destacada)
                    <span class="absolute top-3 right-3 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded">
                        Destacada
                    </span>
                @endif
            </div>

            {{-- Contenido --}}
            <div class="p-4 text-neutral-200">

                <h3 class="text-lg font-semibold mb-1">{{ $exhibicion->titulo }}</h3>

                <p class="text-neutral-400 text-sm mb-3 line-clamp-2">
                    {{ $exhibicion->descripcion }}
                </p>

                <div class="text-neutral-400 text-sm space-y-1 mb-4">
                    <div>
                        <i class="fas fa-calendar-day mr-2"></i>
                        Descubrimiento: {{ \Carbon\Carbon::parse($exhibicion->fecha_descubrimiento)->format('d/m/Y') }}
                    </div>

                    <div>
                        <i class="fas fa-landmark mr-2"></i>
                        Periodo: {{ $exhibicion->periodo }}
                    </div>

                    <div>
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Lugar: {{ $exhibicion->lugar_hallazgo }}
                    </div>

                    <div>
                        <i class="fas fa-check-circle mr-2"></i>
                        Estado: 
                        <span
                            class="font-semibold 
                                @if($exhibicion->estado === 'Publicado') text-green-400
                                @elseif($exhibicion->estado === 'Borrador') text-yellow-400
                                @else text-red-400 @endif">
                            {{ $exhibicion->estado }}
                        </span>
                    </div>
                </div>

                {{-- Acciones --}}
                <div class="flex justify-end items-center gap-2">

                    {{-- Editar --}}
                    <button 
                        wire:click="editar({{ $exhibicion->id }})"
                        class="inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-md transition-colors duration-200"
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
                        class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white p-2 rounded-md transition-colors duration-200"
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
=======
<div>
    
</div>

