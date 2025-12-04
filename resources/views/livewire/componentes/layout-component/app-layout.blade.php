<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mi App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- CONTENIDO --}}
    <div>
        {{ $slot }}
    </div>

    {{-- FOOTER --}}
    @include('layouts.footer')

</body>
</html>
