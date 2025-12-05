<div>
    @if ($open)
        <div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 p-4">

            {{-- CONTENEDOR --}}
            <div class="bg-[#0f0d0d] p-6 rounded-lg border border-[#2a2626] w-full max-w-2xl overflow-y-auto max-h-[90vh]">

                {{-- HEADER --}}
                <div class="mb-6">
                    <h3 class="text-xl font-semibold text-[#e3c27a]">Editar Plato</h3>
                    <p class="text-gray-400 text-sm mt-1">Modifica la información del plato seleccionado</p>
                </div>

                <form wire:submit.prevent="actualizar" class="space-y-4">

                    {{-- NOMBRE --}}
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Nombre</label>
                        <input type="text" wire:model="nombre"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                            focus:outline-none focus:border-[#d4a656]">
                    </div>

                    {{-- DESCRIPCIÓN --}}
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Descripción</label>
                        <textarea wire:model="descripcion" rows="3"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                            focus:outline-none focus:border-[#d4a656]"></textarea>
                    </div>

                    {{-- CATEGORÍA --}}
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Categoría</label>
                        <select wire:model="categoria"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                            focus:outline-none focus:border-[#d4a656]">
                            <option value="">Seleccione...</option>
                            <option value="Entradas">Entradas</option>
                            <option value="Platos principales">Platos principales</option>
                            <option value="Acompañamientos">Acompañamientos</option>
                            <option value="Postres">Postres</option>
                            <option value="Bebidas">Bebidas</option>
                        </select>
                    </div>

                    {{-- PRECIO --}}
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Precio (S/.)</label>
                        <input type="number" step="0.01" wire:model="precio"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                            focus:outline-none focus:border-[#d4a656]">
                    </div>

                    {{-- IMAGEN PRINCIPAL --}}
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Imagen principal (URL)</label>
                        <input type="text" wire:model="imagen_principal"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                            focus:outline-none focus:border-[#d4a656]">
                    </div>

                    {{-- ESTADO --}}
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Estado</label>
                        <select wire:model="estado"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                            focus:outline-none focus:border-[#d4a656]">
                            <option value="Disponible">Disponible</option>
                            <option value="Agotado">Agotado</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                    {{-- BOTONES --}}
                    <div class="flex justify-end gap-3 pt-4">
                        <button type="button" wire:click="$set('open', false)"
                            class="px-6 py-2 border border-gray-600 rounded text-gray-300 hover:bg-gray-800 transition">
                            Cancelar
                        </button>

                        <button type="submit"
                            class="px-6 py-2 bg-[#d4a656] rounded text-black font-semibold hover:bg-[#b88d4e] transition">
                            Guardar cambios
                        </button>
                    </div>

                </form>
            </div>

        </div>
    @endif
</div>
