<a href="{{ route('exhibiciones.show', ['slug' => $exhibicion->slug]) }}"
    class="block bg-[#0d0d0d] border border-yellow-700/40 rounded-xl overflow-hidden shadow-xl hover:scale-[1.02] transition transform duration-300">

    {{-- Imagen principal --}}
    <img 
        src="{{ $exhibicion->imagen_principal }}"
        alt="{{ $exhibicion->titulo }}"
        class="w-full h-64 object-cover"
    >

    <div class="p-6">

        {{-- Categoría --}}
        <p class="text-yellow-500 text-sm tracking-wide uppercase mb-2">
            {{ mb_strtoupper($exhibicion->categoria) }}
        </p>

        {{-- Título --}}
        <h3 class="text-3xl font-serif text-white mb-3">
            {{ $exhibicion->titulo }}
        </h3>

        {{-- Resumen corto --}}
        <p class="text-gray-300 line-clamp-3 mb-4">
            {{ $exhibicion->descripcion }}
        </p>

        {{-- Extra: periodo y lugar --}}
        <div class="flex justify-between text-gray-400 text-sm border-t border-yellow-700/20 pt-4">

            @if ($exhibicion->periodo)
                <span>
                    <span class="text-yellow-500">Periodo:</span>  
                    {{ $exhibicion->periodo }}
                </span>
            @endif

            @if ($exhibicion->lugar_hallazgo)
                <span>
                    <span class="text-yellow-500">Hallazgo:</span>  
                    {{ $exhibicion->lugar_hallazgo }}
                </span>
            @endif
        </div>
    </div>
</a>
