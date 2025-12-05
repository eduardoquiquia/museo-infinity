<div>
    {{-- Overlay --}}
    <div 
        class="@if(!$open) hidden @endif fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
    >
        <div class="relative bg-[#0f0b09] text-neutral-200 w-full max-w-xl p-6 rounded-xl border border-[#3a2f28] shadow-xl z-50
                max-h-[90vh] overflow-y-auto text-sm">

            {{-- Encabezado --}}
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-[#e3c27a]">Nueva Sala Virtual</h3>
                <p class="text-gray-400 text-sm mt-1">Registra una nueva sala para la experiencia virtual</p>
            </div>

            {{-- FORM --}}
            <form wire:submit.prevent="crearSala" class="space-y-4">

                {{-- Título --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Título</label>
                    <input 
                        type="text"
                        wire:model.defer="titulo"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Nombre de la sala"
                    >
                    @error('titulo') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Subtítulo --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Subtítulo</label>
                    <input 
                        type="text"
                        wire:model.defer="subtitulo"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Subtítulo breve"
                    >
                    @error('subtitulo') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Categoría y Nivel --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Categoría</label>
                        <select 
                            wire:model.defer="categoria"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                            focus:outline-none focus:border-[#d4a656]"
                        >
                            <option value="">Seleccione...</option>
                            <option value="Dinosaurios">Dinosaurios</option>
                            <option value="Mamiferos Extintos">Mamíferos Extintos</option>
                            <option value="Arte Rupestre">Arte Rupestre</option>
                            <option value="Herramientas Antiguas">Herramientas Antiguas</option>
                        </select>
                        @error('categoria') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Nivel de Experiencia</label>
                        <select 
                            wire:model.defer="nivel_experiencia"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                            focus:outline-none focus:border-[#d4a656]"
                        >
                            <option value="">Seleccione...</option>
                            <option value="Básico">Básico</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Avanzado">Avanzado</option>
                        </select>
                        @error('nivel_experiencia') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Salas incluidas --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Salas Incluidas</label>
                    <input 
                        type="text"
                        wire:model.defer="salas_incluidas"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ej. Sala 1, Sala 2"
                    >
                    @error('salas_incluidas') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Imagen principal --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Imagen Principal (URL)</label>
                    <input 
                        type="text"
                        wire:model.defer="imagen_principal"
                        placeholder="https://..."
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                    >
                    @error('imagen_principal') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Imagen 360 --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Imagen 360° (Opcional)</label>
                    <input 
                        type="text"
                        wire:model.defer="imagen_360"
                        placeholder="https://..."
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                    >
                    @error('imagen_360') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Descripción --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Descripción</label>
                    <textarea 
                        wire:model.defer="descripcion"
                        rows="4"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Describe la sala virtual"
                    ></textarea>
                    @error('descripcion') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Highlights --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">
                        Highlights (una por línea)
                    </label>
                    <textarea 
                        wire:model.defer="highlights"
                        rows="3"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                            focus:outline-none focus:border-[#d4a656]"
                        placeholder="Highlight 1&#10;Highlight 2&#10;Highlight 3"
                    ></textarea>
                    @error('highlights') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Estado --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Estado</label>
                    <select 
                        wire:model.defer="estado"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-2 text-gray-300 text-sm
                        focus:outline-none focus:border-[#d4a656]"
                    >
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>

                {{-- Botones --}}
                <div class="flex justify-end gap-3 pt-4">
                    <button 
                        type="button"
                        wire:click="$set('open', false)"
                        class="px-5 py-2 border border-gray-600 rounded text-gray-300 text-sm hover:bg-gray-800 transition"
                    >
                        Cancelar
                    </button>

                    <button 
                        type="submit"
                        class="px-5 py-2 bg-[#d4a656] rounded text-black font-semibold text-sm hover:bg-[#b88d4e] transition"
                    >
                        Crear Sala
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
