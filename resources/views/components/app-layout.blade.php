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
    <main class="flex-grow pt-24">
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    @livewire('componentes.layout-component.footer')
    
    @livewire('componentes.entrada-component.entrada-modal')
    @livewire('componentes.auth-component.auth-modal')

    {{-- Livewire Scripts --}}
    @livewireScripts
</body>
</html>