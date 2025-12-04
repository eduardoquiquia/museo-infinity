@props(['exhibicion'])

<div class="bg-[#0d0d0d] border border-yellow-700/50 rounded-xl overflow-hidden shadow-lg">
    
    {{-- Imagen --}}
    <img 
        src="{{ $exhibicion->imagen_principal }}"
        alt="{{ $exhibicion->titulo }}" 
        class="w-full h-64 object-cover"
    >

    <div class="p-6">

        <p class="text-yellow-500 text-sm tracking-wide uppercase">
            {{ mb_strtoupper($exhibicion->categoria) }}
        </p>

        <h3 class="text-2xl font-bold text-white mt-2">
            {{ $exhibicion->titulo }}
        </h3>

        <p class="text-gray-300 mt-4">
            {{ $exhibicion->descripcion }}
        </p>
    </div>

</div>
