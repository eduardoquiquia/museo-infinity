<x-app-layout title="Eventos">
    <section class="relative py-40 px-4 border-b border-[#c9a961]/10 overflow-hidden">
        <!-- Imagen como elemento HTML, no como background -->
        <div class="absolute inset-0 z-0">
            <img 
                src="https://images.unsplash.com/photo-1760544470620-66ae16291e54?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVoaXN0b3JpYyUyMGNhdmUlMjBhcnR8ZW58MXx8fHwxNzYxMDUyODQ5fDA&ixlib=rb-4.1.0&q=80&w=1080&utm_source=figma&utm_medium=referral" 
                alt="Arte rupestre prehistórico" 
                class="w-full h-full object-cover"
            >
            <!-- Overlay con gradiente -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0908]/70 via-[#0a0908]/80 to-[#0a0908]/95"></div>
        </div>
        
        <!-- Contenido -->
        <div class="max-w-7xl mx-auto text-center relative z-10">
            <span class="inline-block px-4 py-1 border border-[#c9a961]/30 text-[#c9a961] text-xs tracking-[0.3em] uppercase mb-6">
                Eventos
            </span>
            <h1 class="text-5xl md:text-6xl text-[#f2f0ed] mb-6">
                Eventos Culturales
            </h1>
            <p class="text-lg text-[#a39d96] max-w-3xl mx-auto">
                Sumérgete en experiencias únicas que conectan el pasado con el presente. 
                Tours nocturnos, talleres educativos y conferencias con expertos.
            </p>
        </div>
    </section>
    <br>
    <!-- Grid de tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto px-4">
            @foreach ($eventos as $evento)
                @livewire('componentes.evento-component.full', [
                    'evento' => $evento,
                    'tipo' => 'full'
                ])
            @endforeach
        </div>
</x-app-layout>