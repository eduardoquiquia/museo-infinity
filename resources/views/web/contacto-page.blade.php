<x-app-layout title="Contacto">
<div class="min-h-screen bg-[#0a0908]">

    {{-- HERO --}}
   <section class="relative pt-36 pb-24 px-4 border-b border-[#c9a961]/10 overflow-hidden">

        <div class="absolute inset-0 z-0">
            <img
                src="https://images.unsplash.com/photo-1666185761824-a355321d1b24?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                class="w-full h-full object-cover"
            />
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0908]/70 via-[#0a0908]/80 to-[#0a0908]/95"></div>
        </div>

        <div class="max-w-5xl mx-auto text-center relative z-10 animate-fade-in">
            <span class="inline-block px-4 py-1 border border-[#c9a961]/30 text-[#c9a961]
                         text-xs tracking-[0.3em] uppercase mb-6">
                Contacto
            </span>

            <h1 class="text-5xl md:text-6xl text-[#f2f0ed] mb-6">
                Contáctanos
            </h1>

            <p class="text-lg text-[#a39d96] max-w-3xl mx-auto">
                ¿Tienes alguna pregunta o sugerencia? Nos encantaría escucharte.
            </p>
        </div>
    </section>


    {{-- INFO --}}
    <section class="py-16 px-4 bg-[#0a0908]">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6 text-center">
                <h3 class="text-xl text-[#f2f0ed] mb-2">Dirección</h3>
                <p class="text-[#a39d96] text-sm">Av. Prehistoria 123<br>Ciudad de la Historia</p>
            </div>

            <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6 text-center">
                <h3 class="text-xl text-[#f2f0ed] mb-2">Teléfono</h3>
                <p class="text-[#a39d96] text-sm">+34 900 123 456</p>
            </div>

            <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6 text-center">
                <h3 class="text-xl text-[#f2f0ed] mb-2">Correo</h3>
                <p class="text-[#a39d96] text-sm">info@museoinfinito.com</p>
            </div>

            <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6 text-center">
                <h3 class="text-xl text-[#f2f0ed] mb-2">Horario</h3>
                <p class="text-[#a39d96] text-sm">L - V: 9:00 - 18:00<br>S - D: 10:00 - 20:00</p>
            </div>

        </div>
    </section>


    {{-- FORM + MAPA --}}
    <section class="py-16 px-4 bg-[#0f0e0d] border-t border-[#c9a961]/10">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            {{-- FORMULARIO --}}
            <div x-data="{submitted:false, loading:false}">
                <div class="border-[#c9a961]/20 bg-[#1a1614] rounded-sm p-8">

                    <h2 class="text-3xl text-[#f2f0ed] mb-6">Envíanos un Mensaje</h2>

                    <div x-show="submitted" class="py-12 text-center">
                        <h3 class="text-2xl text-[#f2f0ed] mb-2">¡Mensaje Enviado!</h3>
                        <p class="text-[#a39d96]">Te responderemos pronto.</p>
                    </div>

                    <form x-show="!submitted" @submit.prevent="loading=true; setTimeout(()=>{submitted=true; loading=false},1000)" class="space-y-6">

                        <input required placeholder="Nombre"
                               class="w-full bg-[#0a0908] border border-[#c9a961]/20 text-white p-3">

                        <input required type="email" placeholder="Correo"
                               class="w-full bg-[#0a0908] border border-[#c9a961]/20 text-white p-3">

                        <textarea required rows="5" placeholder="Mensaje"
                                  class="w-full bg-[#0a0908] border border-[#c9a961]/20 text-white p-3"></textarea>

                        <button type="submit"
                                class="w-full bg-[#c9a961] text-[#0a0908] py-3 rounded-sm">
                            Enviar mensaje
                        </button>

                    </form>

                </div>
            </div>

            {{-- MAPA --}}
            <div class="border-[#c9a961]/20 bg-[#1a1614] rounded-sm overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1696694139314-e0e5962b8dc0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                    class="w-full h-[580px] object-cover"
                >
            </div>

        </div>
    </section>

</div>
</x-app-layout>
