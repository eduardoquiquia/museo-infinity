<div class="bg-[#0f0d0d] p-6 rounded-lg border border-[#2a2626] shadow-lg">
    {{-- TÍTULO + BOTÓN --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold text-[#e3c27a] flex items-center gap-2">
            <i class="fas fa-users"></i>
            Gestión de Usuarios
        </h2>

        <button 
            type="button"
            wire:click="openCreateModal"
            class="bg-[#d4a656] px-4 py-2 rounded text-black font-medium hover:bg-[#b88d4e] transition flex items-center gap-2"
        >
            <i class="fas fa-plus"></i>
            Nuevo Usuario
        </button>
    </div>

    {{-- BUSCADOR USERS --}}
    <div class="mb-4">
        <div class="relative">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>

            <input
                type="text"
                wire:model.live="search"
                placeholder="Buscar usuarios por nombre o email..."
                class="w-full bg-[#141212] border border-[#2a2626] rounded-md py-2 pl-10 pr-4 
                    text-gray-300 focus:outline-none focus:border-[#d4a656]"
            >
        </div>
    </div>

    {{-- TABLA / LISTA DE USUARIOS --}}
    <div class="mt-4">
        <livewire:crud.user-crud.index :search="$search" />
    </div>

    {{-- MODAL CREATE --}}
    <livewire:crud.user-crud.create-form />
</div>
