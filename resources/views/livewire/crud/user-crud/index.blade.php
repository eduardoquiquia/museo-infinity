<div class="w-full mt-5">
    <div class="bg-[#141212] border border-[#2a2626] rounded-lg overflow-hidden">

        {{-- Encabezados --}}
        <div class="grid grid-cols-6 px-6 py-3 text-sm font-semibold text-gray-300 border-b border-[#2a2626]">
            <div>Nombre</div>
            <div>Email</div>
            <div>Rol</div>
            <div>Fecha Registro</div>
            <div>Estado</div>
            <div class="text-right">Acciones</div>
        </div>

        {{-- Filas --}}
        @forelse($usuarios as $user)
            <div class="grid grid-cols-6 px-6 py-4 text-gray-300 border-b border-[#2a2626] items-center">

                {{-- Nombre --}}
                <div class="flex items-center gap-2">
                    <i class="fas fa-user text-gray-400"></i>
                    {{ $user->name }}
                </div>

                {{-- Email --}}
                <div class="flex items-center gap-2">
                    <i class="fas fa-envelope text-gray-400"></i>
                    {{ $user->email }}
                </div>

                {{-- Rol --}}
                <div>
                    @if($user->role === 'admin')
                        <span class="px-3 py-1 text-xs rounded-md bg-[#3c2e13] text-[#d4a656] border border-[#d4a656] flex items-center gap-1 w-fit">
                            <i class="fas fa-id-badge"></i> Admin
                        </span>
                    @else
                        <span class="px-3 py-1 text-xs rounded-md bg-[#1e1b1b] text-gray-300 border border-[#2a2626] flex items-center gap-1 w-fit">
                            <i class="fas fa-user"></i> Usuario
                        </span>
                    @endif
                </div>

                {{-- Fecha --}}
                <div class="flex items-center gap-2">
                    <i class="fas fa-calendar-alt text-gray-400"></i>
                    {{ $user->created_at->format('d/m/Y') }}
                </div>

                {{-- Estado --}}
                <div>
                    @if($user->estado === 'activo')
                        <span class="px-3 py-1 text-xs text-green-500 bg-[#0f2e13] rounded-md">Activo</span>
                    @else
                        <span class="px-3 py-1 text-xs text-red-400 bg-[#2e0f0f] rounded-md">Inactivo</span>
                    @endif
                </div>

                {{-- Acciones --}}
                <div class="flex justify-end items-center gap-2">

                    {{-- Editar: tú llamas tu propio modal --}}
                    <button 
                        wire:click="editar({{ $user->id }})"
                        class="inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-md transition-colors duration-200"
                        title="Editar usuario"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                        </svg>
                    </button>

                    {{-- Eliminar via Livewire --}}
                    <button 
                        wire:click="deleteUser({{ $user->id }})"
                        wire:confirm="¿Eliminar usuario?"
                        class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white p-2 rounded-md transition-colors duration-200"
                        title="Eliminar usuario"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>

            </div>

        @empty
            <div class="px-6 py-6 text-center text-gray-400">
                No se encontraron usuarios.
            </div>
        @endforelse

    </div>
</div>
