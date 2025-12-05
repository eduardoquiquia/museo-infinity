<div class="bg-[#0d0d0d] border border-yellow-700/40 rounded-xl overflow-hidden shadow-xl hover:scale-[1.02] transition transform duration-300">

    {{-- Imagen principal --}}
    <img 
        src="{{ $evento->imagen_principal }}"
        alt="{{ $evento->nombre }}"
        class="w-full h-64 object-cover"
    >

    <div class="p-6">

        {{-- Categoría --}}
        <p class="text-yellow-500 text-sm tracking-wide uppercase mb-2">
            {{ mb_strtoupper($evento->categoria) }}
        </p>

        {{-- Nombre del evento --}}
        <h3 class="text-3xl font-serif text-white mb-3">
            {{ $evento->nombre }}
        </h3>

        {{-- Descripción corta --}}
        <p class="text-gray-300 line-clamp-3 mb-4">
            {{ $evento->descripcion }}
        </p>

        {{-- Extra: fecha - hora - ubicación --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 text-gray-400 text-sm border-t border-yellow-700/20 pt-4">

            {{-- Fecha --}}
            <span>
                <span class="text-yellow-500">Fecha:</span>
                {{ $evento->fecha?->format('d/m/Y') }}
            </span>

            {{-- Hora --}}
            <span>
                <span class="text-yellow-500">Hora:</span>
                {{ $evento->hora }}
            </span>

            {{-- Ubicación --}}
            <span>
                <span class="text-yellow-500">Ubicación:</span>
                {{ $evento->ubicacion }}
            </span>
        </div>

        {{-- Precio + Estado --}}
        <div class="flex justify-between items-center mt-4 text-gray-300 border-t border-yellow-700/20 pt-4">

            {{-- Precio --}}
            <span class="text-lg font-semibold text-yellow-400">
                @if ($evento->precio > 0)
                    S/ {{ number_format($evento->precio, 2) }}
                @else
                    Entrada libre
                @endif
            </span>

            {{-- Estado --}}
            <span 
                class="text-sm px-3 py-1 rounded 
                @if($evento->estado === 'activo') bg-green-700/40 text-green-300
                @elseif($evento->estado === 'cancelado') bg-red-700/40 text-red-300
                @else bg-gray-700/40 text-gray-300
                @endif">
                {{ ucfirst($evento->estado) }}
            </span>
        </div>

    </div>
</div>
