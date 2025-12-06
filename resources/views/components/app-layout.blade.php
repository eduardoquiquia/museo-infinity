<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Museo Infinito' }}</title>
    
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    {{-- Livewire Styles --}}
    @livewireStyles
</head>

<body class="min-h-screen flex flex-col bg-black text-white">
    {{-- NAVBAR --}}
    @livewire('componentes.layout-component.navbar')

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="flex-grow">

        {{ $slot }}
    </main>
    {{-- MODALES EN NAVBAR --}}
    @livewire('componentes.entrada-component.entrada-modal')
    @livewire('componentes.auth-component.auth-modal')

    {{-- MODALES DE PAGO --}}
    @livewire('componentes.pago-component.pago-modal')
    @livewire('componentes.pago-component.alerta-modal')

    {{-- MODALES DE RESERVA --}}
    @livewire('componentes.restaurante-component.reservar-form')

    {{-- FOOTER --}}
    @livewire('componentes.layout-component.footer')

    {{-- MODAL CREATE --}}
    @livewire('crud.user-crud.create-form')
    @livewire('crud.evento-crud.create-form')
    @livewire('crud.exhibicion-crud.create-form')
    @livewire('crud.plato-crud.create-form')
    @livewire('crud.salavirtual-crud.create-form')

    {{-- MODAL EDIT --}}
    @livewire('crud.user-crud.edit-form')
    @livewire('crud.evento-crud.edit-form')
    @livewire('crud.exhibicion-crud.edit-form')
    @livewire('crud.plato-crud.edit-form')
    @livewire('crud.salavirtual-crud.edit-form')

    {{-- Livewire Scripts --}}
    @livewireScripts
</body>
</html>
