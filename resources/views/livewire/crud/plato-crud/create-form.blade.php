<div>
    {{-- Overlay --}}
    <div 
        class="@if(!$open) hidden @endif fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
    >
        <div class="relative bg-[#0f0b09] text-neutral-200 w-full max-w-xl p-6 rounded-xl border border-[#3a2f28] shadow-xl z-50
                max-h-[90vh] overflow-y-auto text-sm">

            {{-- Encabezado --}}
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-[#e3c27a]">Crear Plato</h3>
                <p class="text-gray-400 text-sm mt-1">Ingresa la información del nuevo plato</p>
            </div>

            {{-- FORM --}}
            <form wire:submit.prevent="crearPlato" class="space-y-4">

                {{-- Nombre --}}
                <div>
                    <label class="block text-gray-300 text-xs font-medium mb-1">Nombre del Plato</label>
                    <input 
                        type="text"
                        wire:model.defer="nombre"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ingresa el nombre"
                    >
                    @error('nombre') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Descripción --}}
                <div>
                    <label class="block text-gray-300 text-xs font-medium mb-1">Descripción</label>
                    <textarea 
                        wire:model.defer="descripcion"
                        rows="3"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ingresa la descripción"
                    ></textarea>
                    @error('descripcion') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Categoría --}}
                <div>
                    <label class="block text-gray-300 text-xs font-medium mb-1">Categoría</label>
                    <select 
                        wire:model.defer="categoria"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                    >
                        <option value="">Seleccione...</option>
                        <option value="Entradas">Entradas</option>
                        <option value="Platos principales">Platos principales</option>
                        <option value="Acompañamientos">Acompañamientos</option>
                        <option value="Postres">Postres</option>
                        <option value="Bebidas">Bebidas</option>
                    </select>
                    @error('categoria') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Precio --}}
                <div>
                    <label class="block text-gray-300 text-xs font-medium mb-1">Precio (S/)</label>
                    <input 
                        type="number"
                        wire:model.defer="precio"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                    >
                    @error('precio') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Imagen --}}
                <div>
                    <label class="block text-gray-300 text-xs font-medium mb-1">URL de Imagen</label>
                    <input 
                        type="text"
                        wire:model.defer="imagen_principal"
                        placeholder="https://..."
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                    >
                    @error('imagen_principal') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Estado --}}
                <div>
                    <label class="block text-gray-300 text-xs font-medium mb-1">Estado</label>
                    <select 
                        wire:model.defer="estado"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                    >
                        <option value="Disponible">Disponible</option>
                        <option value="Agotado">Agotado</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>

                {{-- Botones --}}
                <div class="flex justify-end gap-3 pt-4">
                    <button 
                        type="button"
                        wire:click="$set('open', false)"
                        class="px-5 py-2 border border-gray-600 rounded text-gray-300 hover:bg-gray-800 text-sm transition"
                    >
                        Cancelar
                    </button>

                    <button 
                        type="submit"
                        class="px-5 py-2 bg-[#d4a656] rounded text-black font-semibold hover:bg-[#b88d4e] text-sm transition"
                    >
                        Crear Plato
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
