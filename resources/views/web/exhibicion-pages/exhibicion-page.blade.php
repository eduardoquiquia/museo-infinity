<x-app-layout :title="$exhibicion->titulo">

    <!-- HERO -->
    <section class="relative h-[70vh] overflow-hidden">
        <img 
            src="{{$exhibicion->imagen_principal}}"
            class="absolute inset-0 w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-black/60 to-black"></div>

        <div class="relative z-10 h-full flex flex-col justify-end px-6 pb-16 max-w-5xl mx-auto text-white">
            <p class="text-sm tracking-widest text-[#c9a961] uppercase">
                {{ $exhibicion->categoria }}
            </p>

            <h1 class="text-5xl md:text-6xl font-serif mt-2 mb-4">
                {{ $exhibicion->titulo }}
            </h1>

            @if ($exhibicion->periodo)
                <p class="text-gray-300 text-lg">
                    {{ $exhibicion->periodo }}
                </p>
            @endif
        </div>
    </section>

    <!-- CONTENIDO -->
    <section class="bg-[#0c0c0c] text-gray-300 py-20">
        <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- LADO IZQUIERDO -->
            <div class="md:col-span-2 space-y-8">

                <!-- DESCRIPCIÓN -->
                <div>
                    <h2 class="text-3xl text-white font-serif mb-4">Descripción General</h2>
                    <p class="leading-relaxed text-gray-300">
                        {!! nl2br(e($exhibicion->descripcion)) !!}
                    </p>
                </div>

                <!-- DETALLADA -->
                @if($exhibicion->descripcion_detallada)
                <div>
                    <h2 class="text-3xl text-white font-serif mb-4">Detalles de la Exhibición</h2>
                    <p class="leading-relaxed text-gray-300">
                        {!! nl2br(e($exhibicion->descripcion_detallada)) !!}
                    </p>
                </div>
                @endif

                <!-- GALERÍA -->
                @if($exhibicion->imagenes && count($exhibicion->imagenes))
                    <div>
                        <h2 class="text-3xl text-white font-serif mb-6">Galería</h2>

                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($exhibicion->imagenes as $img)
                                <img 
                                    src="{{ asset('storage/' . $img->ruta) }}"
                                    class="rounded-lg object-cover h-40 w-full hover:opacity-80 transition"
                                >
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- SIDEBAR -->
            <div class="bg-[#121212] border border-[#2a2626] p-6 rounded-xl h-fit space-y-6">

                <div>
                    <h3 class="text-lg text-[#c9a961] uppercase tracking-widest mb-2">Categoría</h3>
                    <p class="text-gray-200">{{ $exhibicion->categoria }}</p>
                </div>

                @if($exhibicion->edad_aprox)
                    <div>
                        <h3 class="text-lg text-[#c9a961] uppercase tracking-widest mb-2">Edad Aproximada</h3>
                        <p class="text-gray-200">{{ $exhibicion->edad_aprox }}</p>
                    </div>
                @endif

                @if($exhibicion->ubicacion_descubrimiento)
                    <div>
                        <h3 class="text-lg text-[#c9a961] uppercase tracking-widest mb-2">Descubierto en</h3>
                        <p class="text-gray-200">{{ $exhibicion->ubicacion_descubrimiento }}</p>
                    </div>
                @endif
            </div>

        </div>
    </section>

    <!-- CHAT IA FLOTANTE -->
    @livewire('componentes.chat-ia-component.chat-ia', [
        'entityType' => 'exhibicion',
        'entityId' => $exhibicion->id
    ])
</x-app-layout>
