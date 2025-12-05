<x-app-layout title="Inicio">
    <!-- Hero Section -->
<section class="relative min-h-[100vh] bg-cover bg-center flex items-center justify-center px-16"
style="background-image: url('https://static.nationalgeographicla.com/files/styles/image_3200/public/stan-t-rex-1273195350.jpg?w=1900&h=1267');">

    <!-- Overlay oscuro -->
    <div class="absolute inset-0 bg-black bg-opacity-80 flex items-center justify-center">

        <!-- Contenido -->
        <div class="relative max-w-5xl text-white z-10 px-12 py-10">

            <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] mb-4 px-5 py-0.5
            hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm tracking-[0.25rem]">
                BIENVENIDO
            </p>

            <h1 class="text-8xl font-serif leading-tight mb-6 ">
                Explora el origen del tiempo
            </h1>

            <p class="text-gray-400 mb-8 text-xl font-normal">
                Una colección excepcional de exhibiciones prehistóricas que te transportará
                a través de millones de años de historia natural.
            </p>

            <div class="flex gap-3">
                <a href="{{ route('exhibiciones') }}"
                   class="bg-[#c9a961] font-serif hover:bg-[#c3a961]/90 text-black font-medium px-6 py-3 hover:-translate-y-1 hover:shadow-lg transition-all duration-300 inline-block">
                    Explorar Colección →
                </a>

                <a href="{{ route('restaurante') }}">
                    <button class="border border-[#c3a961]/50 px-6 py-3 font-serif hover:bg-[#1a1614] font-medium hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                        Restaurante
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>

    <section class="bg-[#0a0a0a] py-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center text-gray-200 max-w-5xl mx-auto">

            <!-- Bloque 1 -->
            <div class="group bg-[#111] p-6 rounded-2xl transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.3)]">
                <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-[#1a1a1a] mb-5 transition-transform duration-700 group-hover:rotate-[360deg]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="#c9a961" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <h2 class="text-5xl font-semibold text-[#c9a961]">50.000+</h2>
                <p class="text-gray-400 mt-1">Visitantes Anuales</p>
            </div>


            <!-- Bloque 2 -->
            <div class="group bg-[#111] p-6 rounded-2xl transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.3)]">
                <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-[#1a1a1a] mb-5 transition-transform duration-700 group-hover:rotate-[360deg]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="#c9a961" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z" />
                    </svg>
                </div>

                <h2 class="text-5xl font-semibold text-[#c9a961]">200+</h2>
                <p class="text-gray-400 mt-1">Exhibiciones</p>
            </div>


            <!-- Bloque 3 -->
            <div class="group bg-[#111] p-6 rounded-2xl transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_10px_25px_rgba(234,179,8,0.3)]">
                <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-[#1a1a1a] mb-5 transition-transform duration-700 group-hover:rotate-[360deg]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c9a961" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                    </svg>
                </div>

                <h2 class="text-5xl font-semibold text-[#c9a961]">120+</h2>
                <p class="text-gray-400 mt-1">Especies Únicas</p>
            </div>
    </section>

    <section class="bg-[#070707] py-20">
        <div class="max-w-6xl mx-auto px-4 text-left mb-16">
            <!-- Título superior estilo BIENVENIDO -->
            <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] tracking-[0.25rem] mb-4 px-5 py-0.5
            hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm uppercase">
            COLECCIÓN
            </p>

            <h2 class="text-5xl md:text-6xl font-serif text-gray-100 mt-3 mb-4">
            Exhibiciones Destacadas
            </h2>
            
            <p class="text-gray-400 max-w-2xl">
            Descubre las piezas más extraordinarias de nuestra colección prehistórica.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto px-4">
            <!-- TARJETA SIMPLE -->
            @foreach ($exhibiciones as $exhibicion)
                @livewire('componentes.exhibicion-component.exhibicion-component', [
                    'exhibicion' => $exhibicion,
                    'tipo' => 'simple'
                ])
            @endforeach
        </div>

        <div class="max-w-6xl mx-auto px-4 text-left mb-3 mt-12">
            <a href="{{ route('exhibiciones') }}"
                class="inline-block border border-[#c9a961]/50 text-white tracking-wider mb-0 px-4 py-2
                hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
                Ver Colección Completa
            </a>
        </div>
    </section>

    <!-- Sección Próximos Eventos -->
    <section class="bg-[#0a0a0a] py-20">
        <div class="max-w-6xl mx-auto px-4 text-left mb-16">
            <!-- Título -->
            <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] tracking-[0.25rem] mb-4 px-5 py-0.5
            hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm uppercase">
            EVENTOS
            </p>

            <h2 class="text-5xl md:text-6xl font-serif text-gray-100 mt-3 mb-4">
            Próximos Eventos
            </h2>
            <p class="text-gray-400 max-w-2xl">
            Vive experiencias únicas que te conectan con la historia y el misterio de la prehistoria.
            </p>
        </div>

        <!-- Tarjetas tipo simple -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-6xl mx-auto px-4">
            @foreach ($eventos as $evento)
                @livewire('componentes.evento-component.evento-component', [
                    'evento' => $evento,
                    'tipo' => 'simple'
                ])
            @endforeach
        </div>

        <!-- Botón final -->
        <div class="max-w-6xl mx-auto px-4 text-left mb-3 mt-12">
            <a href="{{ route('eventos') }}"
            class="inline-block border border-[#c9a961]/50 text-white tracking-wider mb-3 px-4 py-2
            hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
            Ver Todos los Eventos
            </a>
        </div>
    </section>

<section class="relative h-[80vh] bg-cover bg-center flex items-center justify-start px-16"
    style="background-image: url(https://wallpapers.com/images/hd/restaurant-background-2ez77umko2vj5w02.jpg);">

    <div class="absolute inset-0 bg-black bg-opacity-85"></div>

    <!-- Contenido centrado -->
    <div class="relative max-w-2xl mt-0 text-white z-10 mx-auto text-center">
        <p class="inline-block border border-[#c9a961]/50 text-[#c9a961] tracking-[0.25rem] mb-5 px-5 py-0.5
            hover:-translate-y-1 hover:shadow-lg transition-all duration-300 text-sm">
            GASTRONOMÍA
        </p>

        <h1 class="text-7xl font-serif leading-tight mb-6 text-center">Restaurante del Museo</h1>

        <p class="text-gray-400 mb-8 text-lg text-center">
            Una experiencia culinaria excepcional que fusiona historia y sabor en un ambiente único.
        </p>

        <div class="flex justify-center gap-4">
            <button 
                @guest onclick="openAuthModal()" @endguest
                @auth onclick="abrirModalReservaMesa()" @endauth
                class="bg-[#c9a961] font-serif hover:bg-[#c3a961]/90 text-black font-medium px-6 py-3 hover:-translate-y-1 hover:shadow-lg transition-all duration-300"
            >
                Reservar Mesa
            </button>
        </div>
    </div>
</section>


</x-app-layout>