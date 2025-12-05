<div>
    @if ($open)
    <div class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 p-4">

        {{-- CONTENEDOR --}}
        <div class="bg-[#0f0d0d] p-6 rounded-lg border border-[#2a2626] w-full max-w-2xl overflow-y-auto max-h-[90vh]">

            {{-- HEADER --}}
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-[#e3c27a]">Editar Exhibición</h3>
                <p class="text-gray-400 text-sm mt-1">Modifica la información de la exhibición</p>
            </div>

            <form wire:submit.prevent="actualizar" class="space-y-4">

                {{-- TÍTULO --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Título</label>
                    <input type="text" wire:model="titulo"
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
                        <option value="Dinosaurios">Dinosaurios</option>
                        <option value="Mamiferos Extintos">Mamíferos Extintos</option>
                        <option value="Arte Rupestre">Arte Rupestre</option>
                        <option value="Herramientas Antiguas">Herramientas Antiguas</option>
                    </select>
                </div>

                {{-- IMAGEN PRINCIPAL --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Imagen principal (URL)</label>
                    <input type="text" wire:model="imagen_principal"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]">
                </div>

                {{-- IMAGEN 360 --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">
                        Imagen 360 (URL) <span class="text-gray-500">(Opcional)</span>
                    </label>
                    <input type="text" wire:model="imagen_360"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]">
                </div>

                {{-- PERIODO --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Periodo</label>
                    <select wire:model="periodo"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]">
                        <option value="">Seleccione...</option>
                        <option value="Periodo Triásico">Periodo Triásico</option>
                        <option value="Periodo Jurásico">Periodo Jurásico</option>
                        <option value="Periodo Cretácico">Periodo Cretácico</option>
                    </select>
                </div>

                {{-- FECHA DE DESCUBRIMIENTO --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Fecha de descubrimiento</label>
                    <input type="date" wire:model="fecha_descubrimiento"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]">
                </div>

                {{-- LUGAR DE HALLAZGO --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Lugar del hallazgo</label>
                    <input type="text" wire:model="lugar_hallazgo"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]">
                </div>

                {{-- DESCRIPCIÓN DETALLADA --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Descripción detallada</label>
                    <textarea wire:model="descripcion_detallada" rows="4"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]"></textarea>
                </div>

                {{-- DESTACADA --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">¿Es destacada?</label>
                    <select wire:model="destacada"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]">
                        <option value="">Seleccione...</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                {{-- ESTADO --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Estado</label>
                    <select wire:model="estado"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]">
                        <option value="Publicado">Publicado</option>
                        <option value="Borrador">Borrador</option>
                        <option value="Archivado">Archivado</option>
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
