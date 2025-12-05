<div>
    {{-- Overlay --}}
    <div 
        class="@if(!$open) hidden @endif fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
    >
        <div class="relative bg-[#0f0b09] text-neutral-200 w-full max-w-xl p-6 rounded-xl border border-[#3a2f28] shadow-xl z-50
                max-h-[90vh] overflow-y-auto text-sm">

            {{-- Encabezado --}}
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-[#e3c27a]">Nueva Exhibición</h3>
                <p class="text-gray-400 text-sm mt-1">Registra una nueva pieza o descubrimiento</p>
            </div>

            {{-- FORM --}}
            <form wire:submit.prevent="crearExhibicion" class="space-y-5">

                {{-- Título --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Título</label>
                    <input 
                        type="text"
                        wire:model.defer="titulo"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Nombre de la exhibición"
                    >
                    @error('titulo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Descripción breve --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Descripción breve</label>
                    <textarea 
                        wire:model.defer="descripcion"
                        rows="3"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ingresa una descripción corta"
                    ></textarea>
                    @error('descripcion') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Categoría y Periodo --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Categoría</label>
                        <select 
                            wire:model.defer="categoria"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                            focus:outline-none focus:border-[#d4a656]"
                        >
                            <option value="">Seleccione...</option>
                            <option value="Dinosaurios">Dinosaurios</option>
                            <option value="Mamiferos Extintos">Mamíferos Extintos</option>
                            <option value="Arte Rupestre">Arte Rupestre</option>
                            <option value="Herramientas Antiguas">Herramientas Antiguas</option>
                        </select>
                        @error('categoria') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Periodo</label>
                        <select 
                            wire:model.defer="periodo"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                            focus:outline-none focus:border-[#d4a656]"
                        >
                            <option value="">Seleccione...</option>
                            <option value="Periodo Triásico">Periodo Triásico</option>
                            <option value="Periodo Jurásico">Periodo Jurásico</option>
                            <option value="Periodo Cretácico">Periodo Cretácico</option>
                        </select>
                        @error('periodo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Imagen principal --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Imagen Principal (URL)</label>
                    <input 
                        type="text"
                        wire:model.defer="imagen_principal"
                        placeholder="https://..."
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                        focus:outline-none focus:border-[#d4a656]"
                    >
                    @error('imagen_principal') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Imagen 360 --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Imagen 360° (Opcional)</label>
                    <input 
                        type="text"
                        wire:model.defer="imagen_360"
                        placeholder="https://..."
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                        focus:outline-none focus:border-[#d4a656]"
                    >
                    @error('imagen_360') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Fecha y Lugar --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Fecha de descubrimiento</label>
                        <input 
                            type="date"
                            wire:model.defer="fecha_descubrimiento"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                            focus:outline-none focus:border-[#d4a656]"
                        >
                        @error('fecha_descubrimiento') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Lugar del hallazgo</label>
                        <input 
                            type="text"
                            wire:model.defer="lugar_hallazgo"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                            focus:outline-none focus:border-[#d4a656]"
                            placeholder="Ej. Patagonia, Argentina"
                        >
                        @error('lugar_hallazgo') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                </div>

                {{-- Descripción detallada --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Descripción detallada</label>
                    <textarea 
                        wire:model.defer="descripcion_detallada"
                        rows="5"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Describe la exhibición a detalle"
                    ></textarea>
                    @error('descripcion_detallada') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Destacada --}}
                <div class="flex items-center gap-2">
                    <input 
                        type="checkbox"
                        wire:model.defer="destacada"
                        class="w-4 h-4 border-[#2a2626] bg-[#141212]"
                    >
                    <label class="text-gray-300 text-sm">Marcar como destacada</label>
                </div>

                {{-- Estado --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Estado</label>
                    <select 
                        wire:model.defer="estado"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                        focus:outline-none focus:border-[#d4a656]"
                    >
                        <option value="Borrador">Borrador</option>
                        <option value="Publicado">Publicado</option>
                        <option value="Archivado">Archivado</option>
                    </select>
                    @error('estado') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Botones --}}
                <div class="flex justify-end gap-3 pt-4">
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
                        Crear Exhibición
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
