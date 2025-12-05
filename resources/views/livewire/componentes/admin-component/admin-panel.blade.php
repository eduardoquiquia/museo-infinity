<section class="max-w-7xl mx-auto px-4 py-12">
    <!-- NAV BAR -->
    <div class="mb-10 flex justify-center">
        <div class="flex gap-3 bg-[#0d0d0d] border border-[#c9a961]/30 px-4 py-2 rounded-xl shadow-md">

            <button wire:click="seleccionar('dashboard')" 
                class="nav-btn {{ $modulo === 'dashboard' ? 'bg-yellow-500 text-black' : '' }}">
                <i class="fa-solid fa-border-all mr-1"></i> Dashboard
            </button>

            <button wire:click="seleccionar('usuarios')" 
                class="nav-btn {{ $modulo === 'usuarios' ? 'bg-yellow-500 text-black' : '' }}">
                <i class="fa-solid fa-user-group mr-1"></i> Usuarios
            </button>

            <button wire:click="seleccionar('exhibiciones')" 
                class="nav-btn {{ $modulo === 'exhibiciones' ? 'bg-yellow-500 text-black' : '' }}">
                <i class="fa-solid fa-image mr-1"></i> Exhibiciones
            </button>

            <button wire:click="seleccionar('salas')" 
                class="nav-btn {{ $modulo === 'salas' ? 'bg-yellow-500 text-black' : '' }}">
                <i class="fa-solid fa-video mr-1"></i> Salas Virtuales
            </button>

            <button wire:click="seleccionar('eventos')" 
                class="nav-btn {{ $modulo === 'eventos' ? 'bg-yellow-500 text-black' : '' }}">
                <i class="fa-solid fa-calendar-days mr-1"></i> Eventos
            </button>

            <button wire:click="seleccionar('platos')" 
                class="nav-btn {{ $modulo === 'platos' ? 'bg-yellow-500 text-black' : '' }}">
                <i class="fa-solid fa-utensils mr-1"></i> Platos
            </button>

        </div>
    </div>

    <!-- CONTENIDO DEL PANEL -->
    <div class="min-h-[400px]">
        @switch($modulo)
            @case('usuarios')
                @livewire('componentes.admin-component.user-section')
                @break

            @case('exhibiciones')
                @livewire('componentes.admin-component.exhibicion-section')
                @break

            @case('salas')
                @livewire('componentes.admin-component.sala-section')
                @break

            @case('eventos')
                @livewire('componentes.admin-component.evento-section')
                @break

            @case('platos')
                @livewire('componentes.admin-component.plato-section')
                @break

            @default
                @livewire('componentes.admin-component.dashboard-section')
        @endswitch
    </div>
</section>
