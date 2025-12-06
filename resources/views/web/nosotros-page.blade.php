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

    <div class="max-w-5xl mx-auto text-center relative z-10
                transition-all duration-700">
        <span class="inline-block px-4 py-1 border border-[#c9a961]/30
                     text-[#c9a961] text-xs tracking-[0.3em] uppercase mb-6">
            Acerca de
        </span>

        <h1 class="text-5xl md:text-6xl text-[#f2f0ed] mb-6">
            Sobre Nosotros
        </h1>

        <p class="text-lg text-[#a39d96] max-w-3xl mx-auto leading-relaxed">
            Desde 2018, el Museo Infinito ha sido un puente entre el pasado prehistórico
            y el futuro digital.
        </p>
    </div>
</section>

{{-- VISIÓN / MISIÓN / VALORES --}}
<section class="py-20 px-4 bg-[#0a0908]">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

@foreach ([
['Visión','eye','Ser el museo virtual de referencia mundial.'],
['Misión','target','Preservar e innovar en experiencias educativas.'],
['Valores','heart','Excelencia, innovación y accesibilidad.']
] as [$title,$icon,$text])

<div class="transition-all duration-500 hover:-translate-y-2 hover:scale-[1.02]">
    <div class="border border-[#c9a961]/20 bg-[#1a1614] p-8 text-center
                hover:border-[#c9a961]/40 transition-all duration-500">
        <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center
                    rounded-full border border-[#c9a961]/20 bg-[#c9a961]/10">
            <i data-lucide="{{ $icon }}" class="w-8 h-8 text-[#c9a961]"></i>
        </div>
        <h3 class="text-2xl text-[#f2f0ed] mb-3">{{ $title }}</h3>
        <p class="text-[#a39d96] leading-relaxed">{{ $text }}</p>
    </div>
</div>

@endforeach
</div>
</section>

{{-- HISTORIA --}}
<section class="py-20 px-4 bg-[#0f0e0d] border-t border-[#c9a961]/10">
<div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">

<div class="transition-transform duration-700 hover:scale-105">
    <div class="relative h-96 overflow-hidden border border-[#c9a961]/20">
        <img
            src="https://images.unsplash.com/photo-1696694139314-e0e5962b8dc0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
            class="w-full h-full object-cover"
        >
    </div>
</div>

<div class="flex flex-col justify-center">
    <h3 class="text-3xl text-[#f2f0ed] mb-6">El Nacimiento de un Sueño</h3>
    <p class="text-[#a39d96] mb-4">
        El Museo Infinito nació de la visión de paleontólogos y tecnólogos.
    </p>
    <p class="text-[#a39d96]">
        Hoy contamos con mas de 2 millones de visitantes virtuales.
    </p>
</div>

</div>
</section>

{{-- TIMELINE LIMPIO --}}
<section class="py-24 px-4 bg-[#0a0908] border-t border-[#c9a961]/10">
<div class="max-w-5xl mx-auto relative">

<div class="absolute left-1/2 top-0 bottom-0 w-[2px] bg-[#c9a961]/30 -translate-x-1/2 hidden md:block"></div>

@foreach ([
['2008','Fundación del Museo'],
['2019','Triceratops llega al museo'],
['2020','Inauguración del restaurante'],
['2022','Expansión digital'],
['2024','Premio internacional'],
['2025','Nueva sala interactiva']
] as $index => $item)

<div class="flex flex-col md:flex-row items-center gap-12 mb-24
{{ $index % 2 ? 'md:flex-row-reverse' : '' }}">

<div class="flex-1 {{ $index % 2 ? 'text-left md:pl-12' : 'text-right md:pr-12' }}">
    <div class="border border-[#c9a961]/20 bg-[#1a1614] p-6
                transition-all duration-500 hover:scale-[1.03] hover:bg-[#1f1b18]">
        <h3 class="text-2xl text-[#f2f0ed] mb-2">{{ $item[1] }}</h3>
    </div>
</div>

<div class="z-10">
    <div class="w-20 h-20 bg-[#c9a961] flex items-center justify-center
                border-4 border-[#0a0908]">
        <span class="text-black font-semibold">{{ $item[0] }}</span>
    </div>
</div>

<div class="flex-1 hidden md:block"></div>

</div>
@endforeach
</div>
</section>

{{-- EQUIPO --}}
<section class="py-20 px-4 bg-gradient-to-br from-[#0a0908] via-[#1a1614] to-[#0a0908] border-t border-[#c9a961]/10">
<div class="max-w-5xl mx-auto text-center">

<h2 class="text-4xl md:text-5xl text-[#f2f0ed] mb-6">Nuestro Equipo</h2>

<p class="text-lg text-[#a39d96] mb-8">
Un equipo multidisciplinario de expertos.
</p>

<p class="text-[#a39d96] italic text-lg">
"Cada fósil tiene una historia que contar."
</p>

<p class="text-[#c9a961] mt-4 font-medium">
— Dr. Carlos Martínez
</p>

</div>
</section>

</div>
</x-app-layout>
