<x-app-layout title="Nosotros">
    <div class="min-h-screen bg-[#0a0908]">

    {{-- HERO --}}
   <section class="relative pt-36 pb-24 px-4 border-b border-[#c9a961]/10 overflow-hidden">

        <div class="absolute inset-0 z-0">
            <img
                src="https://images.unsplash.com/photo-1670915564082-9258f2c326c4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0908]/70 via-[#0a0908]/80 to-[#0a0908]/95"></div>
        </div>

        <div class="max-w-5xl mx-auto text-center relative z-10 animate-fade-in">
            <span class="inline-block px-4 py-1 border border-[#c9a961]/30 text-[#c9a961] text-xs tracking-[0.3em] uppercase mb-6">
                Acerca de
            </span>

            <h1 class="text-5xl md:text-6xl text-[#f2f0ed] mb-6">
                Sobre Nosotros
            </h1>

            <p class="text-lg text-[#a39d96] max-w-3xl mx-auto leading-relaxed">
                Desde 2018, el Museo Infinito ha sido un puente entre el pasado prehistórico
                y el futuro digital, ofreciendo experiencias inmersivas que transforman la
                manera de entender nuestra historia natural.
            </p>
        </div>
    </section>


    {{-- VISIÓN / MISIÓN / VALORES --}}
    <section class="py-20 px-4 bg-[#0a0908]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

            {{-- VISIÓN --}}
            <div class="animate-slide-up">
                <div class="border border-[#c9a961]/20 bg-[#1a1614] p-8 text-center hover:border-[#c9a961]/40 transition-all">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full border border-[#c9a961]/20 bg-[#c9a961]/10">
                        <i data-lucide="eye" class="w-8 h-8 text-[#c9a961]"></i>
                    </div>
                    <h3 class="text-2xl text-[#f2f0ed] mb-3">Visión</h3>
                    <p class="text-[#a39d96] leading-relaxed">
                        Ser el museo virtual de referencia mundial en exhibiciones prehistóricas,
                        democratizando el acceso al conocimiento paleontológico.
                    </p>
                </div>
            </div>

            {{-- MISIÓN --}}
            <div class="animate-slide-up delay-150">
                <div class="border border-[#c9a961]/20 bg-[#1a1614] p-8 text-center hover:border-[#c9a961]/40 transition-all">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full border border-[#c9a961]/20 bg-[#c9a961]/10">
                        <i data-lucide="target" class="w-8 h-8 text-[#c9a961]"></i>
                    </div>
                    <h3 class="text-2xl text-[#f2f0ed] mb-3">Misión</h3>
                    <p class="text-[#a39d96] leading-relaxed">
                        Preservar, investigar y difundir el patrimonio prehistórico mediante
                        experiencias educativas innovadoras y accesibles para todos.
                    </p>
                </div>
            </div>

            {{-- VALORES --}}
            <div class="animate-slide-up delay-300">
                <div class="border border-[#c9a961]/20 bg-[#1a1614] p-8 text-center hover:border-[#c9a961]/40 transition-all">
                    <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center rounded-full border border-[#c9a961]/20 bg-[#c9a961]/10">
                        <i data-lucide="heart" class="w-8 h-8 text-[#c9a961]"></i>
                    </div>
                    <h3 class="text-2xl text-[#f2f0ed] mb-3">Valores</h3>
                    <p class="text-[#a39d96] leading-relaxed">
                        Excelencia científica, innovación tecnológica, accesibilidad universal,
                        respeto por el patrimonio y compromiso educativo.
                    </p>
                </div>
            </div>

        </div>
    </section>


    {{-- HISTORIA / IMAGEN Y TEXTO --}}
    <section class="py-20 px-4 bg-[#0f0e0d] border-t border-[#c9a961]/10">
        <div class="max-w-5xl mx-auto">

            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl text-[#f2f0ed] mb-6">Nuestra Historia</h2>
                <p class="text-lg text-[#a39d96] max-w-3xl mx-auto">
                    Un viaje de pasión por la paleontología y la innovación tecnológica
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                {{-- IMAGEN --}}
                <div class="animate-slide-left">
                    <div class="relative h-96 rounded-sm overflow-hidden border border-[#c9a961]/20">
                        <img
                            src="https://images.unsplash.com/photo-1696694139314-e0e5962b8dc0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                            class="w-full h-full object-cover"
                        >
                    </div>
                </div>

                {{-- TEXTO --}}
                <div class="flex flex-col justify-center animate-slide-right">
                    <h3 class="text-3xl text-[#f2f0ed] mb-6">El Nacimiento de un Sueño</h3>

                    <p class="text-[#a39d96] leading-relaxed mb-4">
                        El Museo Infinito nació de la visión de un grupo de paleontólogos
                        y tecnólogos que soñaban con hacer accesible el fascinante mundo
                        prehistórico a personas de todo el mundo.
                    </p>

                    <p class="text-[#a39d96] leading-relaxed">
                        Hoy, contamos con una colección de más de 300 piezas,
                        colaboraciones con instituciones científicas de 25 países y
                        más de 2 millones de visitantes virtuales anuales.
                    </p>
                </div>

            </div>

        </div>
    </section>

{{-- TIMELINE --}}
<section class="py-24 px-4 bg-[#0a0908] border-t border-[#c9a961]/10">
    <div class="max-w-5xl mx-auto">

        {{-- HEADER --}}
        <div class="text-center mb-20">
            <span class="inline-block px-4 py-1 border border-[#c9a961]/30 text-[#c9a961] text-xs tracking-[0.3em] uppercase mb-6">
                Historia
            </span>
            <h2 class="text-4xl md:text-5xl text-[#f2f0ed] mb-6">Hitos del Museo</h2>
            <p class="text-lg text-[#a39d96]">Los momentos que han definido nuestro camino</p>
        </div>

        <div class="relative">

            {{-- LÍNEA CENTRAL --}}
            <div class="absolute left-1/2 top-0 bottom-0 w-[2px] bg-[#c9a961]/30 -translate-x-1/2 hidden md:block"></div>

            <div class="space-y-24">

                {{-- ITEM 1 --}}
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="flex-1 text-right md:pr-12">
                        <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6">
                            <h3 class="text-2xl text-[#f2f0ed] mb-2">Fundación del Museo</h3>
                            <p class="text-[#a39d96]">Apertura oficial con 50 piezas prehistóricas</p>
                        </div>
                    </div>

                    <div class="z-10">
                        <div class="w-20 h-20 bg-[#c9a961] flex items-center justify-center border-4 border-[#0a0908]">
                            <span class="text-black font-semibold">2008</span>
                        </div>
                    </div>

                    <div class="flex-1 hidden md:block"></div>
                </div>

                {{-- ITEM 2 --}}
                <div class="flex flex-col md:flex-row-reverse items-center gap-12">
                    <div class="flex-1 text-left md:pl-12">
                        <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6">
                            <h3 class="text-2xl text-[#f2f0ed] mb-2">Triceratops al Museo</h3>
                            <p class="text-[#a39d96]">Se integra el fósil más emblemático</p>
                        </div>
                    </div>

                    <div class="z-10">
                        <div class="w-20 h-20 bg-[#c9a961] flex items-center justify-center border-4 border-[#0a0908]">
                            <span class="text-black font-semibold">2019</span>
                        </div>
                    </div>

                    <div class="flex-1 hidden md:block"></div>
                </div>

                {{-- ITEM 3 --}}
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="flex-1 text-right md:pr-12">
                        <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6">
                            <h3 class="text-2xl text-[#f2f0ed] mb-2">Restaurante Inaugurado</h3>
                            <p class="text-[#a39d96]">Chef María Sánchez lidera la cocina</p>
                        </div>
                    </div>

                    <div class="z-10">
                        <div class="w-20 h-20 bg-[#c9a961] flex items-center justify-center border-4 border-[#0a0908]">
                            <span class="text-black font-semibold">2020</span>
                        </div>
                    </div>

                    <div class="flex-1 hidden md:block"></div>
                </div>

                {{-- ITEM 4 --}}
                <div class="flex flex-col md:flex-row-reverse items-center gap-12">
                    <div class="flex-1 text-left md:pl-12">
                        <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6">
                            <h3 class="text-2xl text-[#f2f0ed] mb-2">Expansión Digital</h3>
                            <p class="text-[#a39d96]">Tours virtuales y experiencias 360°</p>
                        </div>
                    </div>

                    <div class="z-10">
                        <div class="w-20 h-20 bg-[#c9a961] flex items-center justify-center border-4 border-[#0a0908]">
                            <span class="text-black font-semibold">2022</span>
                        </div>
                    </div>

                    <div class="flex-1 hidden md:block"></div>
                </div>

                {{-- ITEM 5 --}}
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="flex-1 text-right md:pr-12">
                        <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6">
                            <h3 class="text-2xl text-[#f2f0ed] mb-2">Premio Internacional</h3>
                            <p class="text-[#a39d96]">Mejor Museo Virtual de Europa</p>
                        </div>
                    </div>

                    <div class="z-10">
                        <div class="w-20 h-20 bg-[#c9a961] flex items-center justify-center border-4 border-[#0a0908]">
                            <span class="text-black font-semibold">2024</span>
                        </div>
                    </div>

                    <div class="flex-1 hidden md:block"></div>
                </div>

                {{-- ITEM 6 --}}
                <div class="flex flex-col md:flex-row-reverse items-center gap-12">
                    <div class="flex-1 text-left md:pl-12">
                        <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6">
                            <h3 class="text-2xl text-[#f2f0ed] mb-2">Sala Interactiva</h3>
                            <p class="text-[#a39d96]">Realidad aumentada y talleres educativos</p>
                        </div>
                    </div>

                    <div class="z-10">
                        <div class="w-20 h-20 bg-[#c9a961] flex items-center justify-center border-4 border-[#0a0908]">
                            <span class="text-black font-semibold">2025</span>
                        </div>
                    </div>

                    <div class="flex-1 hidden md:block"></div>
                </div>

            </div>
        </div>
    </div>
</section>



    {{-- EQUIPO --}}
    <section class="py-20 px-4 bg-gradient-to-br from-[#0a0908] via-[#1a1614] to-[#0a0908] border-t border-[#c9a961]/10">
        <div class="max-w-5xl mx-auto text-center">

            <span class="inline-block px-4 py-1 border border-[#c9a961]/30 text-[#c9a961] text-xs tracking-[0.3em] uppercase mb-6">
                Equipo
            </span>

            <h2 class="text-4xl md:text-5xl text-[#f2f0ed] mb-6">Nuestro Equipo</h2>

            <p class="text-lg text-[#a39d96] mb-8 max-w-3xl mx-auto">
                Un equipo multidisciplinario de paleontólogos, conservadores,
                educadores, tecnólogos y artistas.
            </p>

            <hr class="my-8 border-[#c9a961]/20">

            <p class="text-[#a39d96] italic text-lg">
                "Cada fósil tiene una historia que contar. Nuestro trabajo es
                narrar esas historias para las generaciones presentes y futuras."
            </p>

            <p class="text-[#c9a961] mt-4 font-medium">
                — Dr. Carlos Martínez, Director del Museo Infinito
            </p>

        </div>
    </section>

</div>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</x-app-layout>
