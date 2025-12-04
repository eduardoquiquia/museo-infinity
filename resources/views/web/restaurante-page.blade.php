<x-app-layout title="Restaurante">
    <section class="relative py-40 px-4 border-b border-[#c9a961]/10 overflow-hidden">
        <!-- Imagen como elemento HTML, no como background -->
        <div class="absolute inset-0 z-0">
            <img 
                src="https://wallpapers.com/images/hd/restaurant-background-2ez77umko2vj5w02.jpg" 
                alt="Arte rupestre prehistórico" 
                class="w-full h-full object-cover"
            >
            <!-- Overlay con gradiente -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0908]/70 via-[#0a0908]/80 to-[#0a0908]/95"></div>
        </div>

        <!-- Contenido centrado -->
        <div class="relative max-w-2xl mt-0 text-white z-10 mx-auto text-center">
            <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] tracking-[0.25rem] mb-5 px-5 py-0.5
                hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
                GASTRONOMIA
            </p>

            <h1 class="text-7xl font-serif leading-tight mb-6 text-center">Restaurante del Museo</h1>

            <p class="text-gray-400 mb-8 text-lg text-center">
                Una experiencia culinaria excepcional que fusiona historia y sabor en un
                ambiente único
            </p>

            <div class="flex justify-center gap-4">
                <button class="bg-[#c9a961] font-serif hover:bg-yellow-500 text-black font-medium px-6 py-3 hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    Reservar Mesa
                </button>
            </div>
        </div>
    </section>

    <section class="bg-[#0a0a0a] py-20">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Título de la sección -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-serif text-white mb-4">Nuestro Menú</h2>
                <p class="text-gray-400 text-lg">Descubre nuestra selección de platos exclusivos</p>
            </div>

            <!-- Filtros -->
            <div class="flex justify-center mb-12">
                <form method="GET" class="flex gap-4">
                    <select 
                        name="categoria" 
                        class="bg-[#1a1a1a] text-white border border-[#c9a961]/30 px-4 py-2"
                        onchange="this.form.submit()"
                    >
                        <option value="">Todas las categorías</option>

                        @foreach ($categorias as $cat)
                            <option value="{{ $cat }}" {{ $categoria == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>

                    @if($categoria)
                        <a 
                            href="{{ route('web.restaurante') }}" 
                            class="text-[#c9a961] underline px-2 py-2"
                        >
                            Limpiar
                        </a>
                    @endif
                </form>
            </div>

            <!-- Grid de platos -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach ($platos as $plato)
                    @livewire('componentes.restaurante-component.plato', ['plato' => $plato], key($plato->id))
                @endforeach
            </div>

            <!-- Si no hay platos -->
            @if($platos->count() == 0)
                <div class="text-center text-gray-400 py-12">
                    <p class="text-lg">No hay platos disponibles en este momento.</p>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>