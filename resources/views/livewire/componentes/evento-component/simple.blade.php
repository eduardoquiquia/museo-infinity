<div class="bg-[#0d0d0d] border border-[#1f1f1f] rounded-xl overflow-hidden flex shadow-lg">
    {{-- Imagen --}}
    <div class="w-1/2">
        <img 
            src="{{ $evento->ruta_imagen }}" 
            alt="{{ $evento->nombre }}" 
            class="w-full h-full object-cover"
        >
    </div>

    {{-- Contenido --}}
    <div class="w-1/2 p-5 flex flex-col justify-between">

        <div>
            {{-- Fecha --}}
            <p class="text-yellow-500 text-sm tracking-wide uppercase">
                {{ mb_strtoupper($evento->fecha->locale('es')->translatedFormat('d \\de F, Y')) }}
            </p>

            {{-- Título --}}
            <h2 class="text-3xl font-bold text-white mt-2">
                {{ $evento->nombre }}
            </h2>

            {{-- Descripción --}}
            <p class="text-gray-300 mt-4">
                {{ $evento->descripcion }}
            </p>

            {{-- Horario --}}
            <p class="text-gray-400 mt-4">
                {{ $evento->hora }}
            </p>
        </div>

        {{-- Precio + Botón --}}
        <div class="mt-6 flex items-center justify-between gap-4">
            <p class="text-white text-xl font-semibold">
                S/{{ number_format($evento->precio, 0) }}
            </p>

            @guest
                <button 
                    wire:click="$dispatch('abrir-auth')"
                    class="bg-yellow-600 hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-lg transition"
                >
                    Comprar Entrada
                </button>
            @endguest

            @auth
                <button 
                    wire:click="$dispatch('abrir-modal-entrada', { id: {{ $evento->id }} })"
                    class="bg-yellow-600 hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-lg transition"
                >
                    Comprar Entrada
                </button>
            @endauth
        </div>
    </div>
</div>
