<div class="bg-[#0f0d0d] p-6 rounded-lg border border-[#2a2626] shadow-lg">
    {{-- TÍTULO + BOTÓN --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-[#e3c27a] flex items-center gap-2">
            <i class="fas fa-users"></i>
            Gestión de Reservas del Restaurante
        </h2>
    </div>

    {{-- BUSCADOR EVENTOS --}}
    <div class="mb-4">
        <div class="relative">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>

            <input
                type="text"
                wire:model.live="search"
                placeholder="Buscar por nombre, email o ID..."
                class="w-full bg-[#141212] border border-[#2a2626] rounded-md py-2 pl-10 pr-4 
                    text-gray-300 focus:outline-none focus:border-[#d4a656]"
            >
        </div>
    </div>

    {{-- FILTRAR POR ESTADOS --}}
    <div>
        
    </div>
    {{-- TABLA / LISTA DE RESERVAS --}}
    <div class="mt-4">
        <livewire:crud.evento-crud.index :search="$search" />
    </div>
</div>