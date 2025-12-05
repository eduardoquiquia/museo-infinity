<x-app-layout title="Panel de Administrador">
    {{-- Encabezado del Panel --}}
    <section class="relative py-40 px-4 border-b border-[#c9a961]/10 overflow-hidden">
        <div class="relative max-w-2xl mt-0 text-white z-10 mx-auto text-center">
            <h2 class="text-7xl font-serif leading-tight mb-6 text-center">Panel de Administración</h2>
            <p class="text-gray-400 mb-8 text-lg text-center">
                Gestiona todos los aspectos del Museo Infinito
            </p>
        </div>
    </section>
    @livewire('componentes.admin-component.admin-panel')
</x-app-layout>