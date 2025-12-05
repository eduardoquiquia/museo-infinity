<div>
    {{-- Overlay --}}
    <div 
        class="@if(!$open) hidden @endif fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
    >
        <div class="bg-[#0f0d0d] p-6 rounded-lg border border-[#2a2626] w-full max-w-md">

            {{-- Encabezado --}}
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-[#e3c27a]">Crear Usuario</h3>
                <p class="text-gray-400 text-sm mt-1">Ingresa la información del nuevo usuario</p>
            </div>

            <form wire:submit.prevent="crearUsuario">

                {{-- Nombre --}}
                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-medium mb-2">Nombre Completo</label>
                    <input 
                        type="text"
                        wire:model.defer="name"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ingresa el nombre completo"
                    >
                    @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-medium mb-2">Email</label>
                    <input 
                        type="email"
                        wire:model.defer="email"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ingresa el email"
                    >
                    @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-medium mb-2">Contraseña</label>
                    <input 
                        type="password"
                        wire:model.defer="password"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ingresa la contraseña"
                    >
                    @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Rol --}}
                <div class="mb-4">
                    <label class="block text-gray-300 text-sm font-medium mb-2">Rol</label>
                    <select 
                        wire:model.defer="role"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]"
                    >
                        @foreach(App\Models\User::ROLES as $rol)
                            <option value="{{ $rol }}">{{ ucfirst($rol) }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Estado --}}
                <div class="mb-6">
                    <label class="block text-gray-300 text-sm font-medium mb-2">Estado</label>
                    <select 
                        wire:model.defer="estado"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]"
                    >
                        @foreach(App\Models\User::ESTADOS as $estado)
                            <option value="{{ $estado }}">{{ ucfirst($estado) }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Botones --}}
                <div class="flex justify-end gap-3">
                    <button 
                        type="button"
                        wire:click="$set('open', false)"
                        class="px-6 py-2 border border-gray-600 rounded text-gray-300 hover:bg-gray-800 transition"
                    >
                        Cancelar
                    </button>

                    <button 
                        type="submit"
                        class="px-6 py-2 bg-[#d4a656] rounded text-black font-semibold hover:bg-[#b88d4e] transition"
                    >
                        Crear Usuario
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
