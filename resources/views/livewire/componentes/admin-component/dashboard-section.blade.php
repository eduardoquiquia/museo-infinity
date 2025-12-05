<div class="p-6 bg-[#0a0a0a] rounded-lg shadow-md">
    <h2 class="text-2xl font-bold font-serif mb-4">Dashboard</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Usuarios Totales -->
        <div class="bg-[#111] p-4 rounded-lg border border-[#c9a961]/50">
            <h3 class="font-normal uppercase text-gray-400">Usuarios Totales</h3>
            <p class="text-3xl">{{ number_format($usuarios->total_usuarios) }}</p>
            <p class="text-sm {{ $usuarios->crecimiento_porcentaje >= 0 ? 'text-green-600' : 'text-red-600' }}">
                ~{{ round($usuarios->crecimiento_porcentaje, 2) }}% vs mes anterior
            </p>
        </div>

        <!-- Exhibiciones Activas -->
        <div class="bg-[#111] p-4 rounded-lg border border-[#c9a961]/50">
            <h3 class="font-normal uppercase text-gray-400">Exhibiciones Activas</h3>
            <p class="text-3xl">{{ number_format($exhibiciones->total_activas) }}</p>
            <p class="text-sm {{ $exhibiciones->crecimiento_porcentaje >= 0 ? 'text-green-600' : 'text-red-600' }}">
                ~{{ round($exhibiciones->crecimiento_porcentaje, 2) }}% vs mes anterior
            </p>
        </div>

        <!-- Eventos Programados -->
        <div class="bg-[#111] p-4 rounded-lg border border-[#c9a961]/50">
            <h3 class="font-normal uppercase text-gray-400">Eventos Programados</h3>
            <p class="text-3xl">{{ number_format($eventos->total_eventos) }}</p>
            <p class="text-sm {{ $eventos->crecimiento_porcentaje >= 0 ? 'text-green-600' : 'text-red-600' }}">
                ~{{ round($eventos->crecimiento_porcentaje, 2) }}% vs mes anterior
            </p>
        </div>

        <!-- Reservas del Mes -->
        <div class="bg-[#111] p-4 rounded-lg border border-[#c9a961]/50">
            <h3 class="font-normal uppercase text-gray-400">Reservas del Mes</h3>
            <p class="text-3xl">{{ number_format($reservas->total_reservas) }}</p>
            <p class="text-sm {{ $reservas->crecimiento_porcentaje >= 0 ? 'text-green-600' : 'text-red-600' }}">
                ~{{ round($reservas->crecimiento_porcentaje, 2) }}% vs mes anterior
            </p>
        </div>

        <!-- Tickets Vendidos -->
        <div class="bg-[#111] p-4 rounded-lg border border-[#c9a961]/50">
            <h3 class="font-normal uppercase text-gray-400">Tickets Vendidos</h3>
            <p class="text-3xl">{{ number_format($tickets->total_tickets) }}</p>
            <p class="text-sm {{ $tickets->crecimiento_porcentaje >= 0 ? 'text-green-600' : 'text-red-600' }}">
                ~{{ round($tickets->crecimiento_porcentaje, 2) }}% vs mes anterior
            </p>
        </div>

        <!-- Ingresos del Mes -->
        <div class="bg-[#111] p-4 rounded-lg border border-[#c9a961]/50">
            <h3 class="font-normal uppercase text-gray-400">Ingresos del Mes</h3>
            <p class="text-3xl">S/ {{ number_format($ingresos->ingresos_mes, 2) }}</p>
            <p class="text-sm {{ $ingresos->crecimiento_porcentaje >= 0 ? 'text-green-600' : 'text-red-600' }}">
                ~{{ round($ingresos->crecimiento_porcentaje, 2) }}% vs mes anterior
            </p>
        </div>


    </div>
</div>
