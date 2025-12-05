<x-app-layout title="Salas Virtuales">
    <section class="relative py-40 px-4 border-b border-[#c9a961]/10 overflow-hidden">
        <!-- Imagen como elemento HTML, no como background -->
        <div class="absolute inset-0 z-0">
            <img 
                src="https://images.unsplash.com/photo-1538388149542-5e24932d11a8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx2aXJ0dWFsJTIwcmVhbGl0eSUyMG11c2V1bSUyMHRvdXJ8ZW58MXx8fHwxNzYzMzM5NDI3fDA&ixlib=rb-4.1.0&q=80&w=1080" 
                alt="aña" 
                class="w-full h-full object-cover"
            >
            <!-- Overlay con gradiente -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0908]/70 via-[#0a0908]/80 to-[#0a0908]/95"></div>
        </div>

        <!-- Contenido centrado -->
        <div class="relative max-w-2xl mt-0 text-white z-10 mx-auto text-center">
            <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] tracking-[0.25rem] mb-5 px-5 py-0.5
                hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
                RECORRIDOS
            </p>

            <h1 class="text-7xl font-serif leading-tight mb-6 text-center">Rutas Virtuales</h1>

            <p class="text-gray-400 mb-8 text-lg text-center">
                Recorridos inmersivos en 360° que te transportan a través de millones de años de historia natural
            </p>
        </div>
    </section>

    <section class="bg-[#0a0a0a] py-20">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Título de la sección -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-serif text-white mb-4">Nuestras Rutas Virtuales</h2>
                <p class="text-gray-400 text-lg">Descubre recorridos temáticos diseñados para sumergirte en las maravillas de la prehistoria</p>
            </div>

            <!-- Filtros -->
            <div class="flex justify-center mb-12">
                <form method="GET" class="flex flex-col md:flex-row gap-4">

                    <!-- Categorías -->
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
                        <a href="{{ route('web.salas-virtuales') }}"
                            class="text-[#c9a961] underline px-2 py-2">
                            Limpiar
                        </a>
                    @endif

                </form>
            </div>

            <!-- Grid de tarjetas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto px-4">
                @foreach ($salas as $sala)
                    @livewire('componentes.salavirtual-component.sala', ['sala' => $sala])
                @endforeach
            </div>

            <!-- Si no hay salas -->
            @if($salas->count() == 0)
                <div class="text-center text-gray-400 py-12">
                    <p class="text-lg">No hay rutas virtuales disponibles en este momento.</p>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>