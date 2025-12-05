<div class="bg-neutral-900 rounded-lg overflow-hidden shadow-lg border border-yellow-700/20">

    {{-- Imagen principal --}}
    <img 
        src="{{ $plato->imagen_principal }}"
        alt="{{ $plato->nombre }}"
        class="w-full h-64 object-cover"
    />

    <div class="p-6">

        {{-- Categoría --}}
        <p class="text-yellow-500 text-sm tracking-wide uppercase mb-2">
            {{ mb_strtoupper($plato->categoria) }}
        </p>

        {{-- Nombre del plato --}}
        <h3 class="text-3xl font-serif text-white mb-3">
            {{ $plato->nombre }}
        </h3>

        {{-- Descripción --}}
        <p class="text-gray-300 line-clamp-3 mb-4">
            {{ $plato->descripcion }}
        </p>

        {{-- Precio + Estado --}}
        <div class="flex justify-between items-center text-gray-300 border-t border-yellow-700/20 pt-4">

            {{-- Precio --}}
            <span class="text-lg font-semibold text-yellow-400">
                S/ {{ number_format($plato->precio, 2) }}
            </span>

            {{-- Estado --}}
            <span 
                class="text-sm px-3 py-1 rounded 
                @if($plato->estado === 'Disponible') bg-green-700/40 text-green-300 
                @elseif($plato->estado === 'Agotado') bg-red-700/40 text-red-300 
                @else bg-gray-700/40 text-gray-300 
                @endif">
                {{ $plato->estado }}
            </span>
        </div>

    </div>

</div>
