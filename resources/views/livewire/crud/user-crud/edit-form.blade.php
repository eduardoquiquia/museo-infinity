<div>
    @if($open)
    <div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 p-4">
        <div class="bg-[#0f0d0d] p-6 rounded-lg border border-[#2a2626] w-full max-w-md">

            {{-- Encabezado --}}
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-[#e3c27a]">Editar Usuario</h3>
                <p class="text-gray-400 text-sm mt-1">Modifica la información del usuario</p>
            </div>

            <form wire:submit.prevent="actualizar" class="space-y-4">

                {{-- Nombre --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Nombre Completo</label>
                    <input type="text" wire:model="name"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]"
                        placeholder="Nombre completo">
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Email</label>
                    <input type="email" wire:model="email"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]"
                        placeholder="Correo electrónico">
                </div>

                {{-- Rol --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Rol</label>
                    <select wire:model="role"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]">
                        <option value="admin">Admin</option>
                        <option value="user">Usuario</option>
                    </select>
                </div>

                {{-- Estado --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Estado</label>
                    <select wire:model="estado"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 focus:outline-none focus:border-[#d4a656]">
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>

                {{-- Botones --}}
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" wire:click="$set('open', false)"
                        class="px-6 py-2 border border-gray-600 rounded text-gray-300 hover:bg-gray-800 transition">
                        Cancelar
                    </button>

                    <button type="submit"
                        class="px-6 py-2 bg-[#d4a656] rounded text-black font-semibold hover:bg-[#b88d4e] transition">
                        Guardar
                    </button>
                </div>

            </form>
        </div>
    </div>
    @endif
</div>
