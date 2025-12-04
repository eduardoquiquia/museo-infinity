@if($open)
<div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50">
    <div class="bg-[#141212] border border-[#2a2626] rounded-xl p-6 w-full max-w-md">

        <h2 class="text-xl text-white mb-4 font-semibold">Editar Usuario</h2>

        <div class="space-y-4">

            <input type="text" wire:model="name"
                class="w-full bg-[#1c1c1c] border border-[#333] rounded p-2 text-white"
                placeholder="Nombre">

            <input type="email" wire:model="email"
                class="w-full bg-[#1c1c1c] border border-[#333] rounded p-2 text-white"
                placeholder="Email">

            <select wire:model="role"
                    class="w-full bg-[#1c1c1c] border border-[#333] rounded p-2 text-white">
                <option value="admin">Admin</option>
                <option value="user">Usuario</option>
            </select>

            <select wire:model="estado"
                    class="w-full bg-[#1c1c1c] border border-[#333] rounded p-2 text-white">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>

        </div>

        <div class="flex justify-end mt-6 gap-3">
            <button wire:click="$set('open', false)"
                    class="px-4 py-2 bg-gray-600 rounded text-white">Cancelar</button>

            <button wire:click="actualizar"
                    class="px-4 py-2 bg-yellow-500 rounded text-black font-semibold">Guardar</button>
        </div>
    </div>
</div>
@endif
