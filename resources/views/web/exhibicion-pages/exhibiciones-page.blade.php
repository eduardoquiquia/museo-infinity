<x-app-layout title="Exhibiciones">
    <section class="relative py-40 px-4 border-b border-[#c9a961]/10 overflow-hidden">
        <!-- Imagen como elemento HTML, no como background -->
        <div class="absolute inset-0 z-0">
            <img 
                src="https://images.unsplash.com/photo-1675882767533-ec7bdf8b2210?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxkaW5vc2F1ciUyMGZvc3NpbHMlMjBtdXNldW18ZW58MXx8fHwxNzYxMDUyNTA2fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral" 
                alt="Arte rupestre prehistórico" 
                class="w-full h-full object-cover"
            >
            <!-- Overlay con gradiente -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0908]/70 via-[#0a0908]/80 to-[#0a0908]/95"></div>
        </div>
        <!-- Contenido centrado -->
        <div class="relative h-full flex items-center justify-center text-center text-white z-10">
            <div class="max-w-2xl">
                <!-- Título superior estilo BIENVENIDO -->
                <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] tracking-[0.25rem] mb-4 px-5 py-0.5
                hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm uppercase">
                COLECCIÓN
                </p>

                <h2 class="text-5xl md:text-6xl font-serif text-gray-100 mt-3 mb-4">
                Exhibiciones Destacadas
                </h2>
                
                <p class="text-gray-400 mb-8 text-lg">
                Explora nuestra excepcional colección de fósiles, arte rupestre y artefactos que cuentan 
                la historia de la vida en la Tierra
                </p>
            </div>
        </div>
    </section>

    <section class="bg-[#070707] py-20">
        <!-- Filtros -->
        <div class="max-w-6xl mx-auto px-4 mb-12">
            <form method="GET" class="flex flex-col md:flex-row gap-4">

                <!-- Buscador -->
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Buscar exhibiciones..."
                    class="bg-[#1a1a1a] text-white border border-[#c9a961]/30 px-4 py-2 w-full"
                >

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

                @if($categoria || $search)
                    <a href="{{ route('exhibiciones') }}"
                        class="text-[#c9a961] underline px-2 py-2">
                        Limpiar
                    </a>
                @endif

            </form>
        </div>

        <!-- Grid de tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto px-4">
            @foreach ($exhibiciones as $exhibicion)
                @livewire('componentes.exhibicion-component.full', [
                    'exhibicion' => $exhibicion,
                    'tipo' => 'full'
                ])
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="mt-12">
            {{ $exhibiciones->links() }}
        </div>
    </section>
</x-app-layout>