<div>
    {{-- Overlay --}}
    <div 
        class="@if(!$open) hidden @endif fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
    >
        <div class="relative bg-[#0f0b09] text-neutral-200 w-full max-w-xl p-6 rounded-xl border border-[#3a2f28] shadow-xl z-50
                max-h-[90vh] overflow-y-auto text-sm">

            {{-- Encabezado --}}
            <div class="mb-6">
                <h3 class="text-2xl font-semibold text-[#e3c27a]">Crear Evento</h3>
                <p class="text-gray-400 text-sm mt-1">Ingresa la información del nuevo evento</p>
            </div>

            {{-- FORM --}}
            <form wire:submit.prevent="crearEvento" class="space-y-5">

                {{-- Título --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Título del Evento</label>
                    <input 
                        type="text"
                        wire:model.defer="nombre"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ingresa el título"
                    >
                    @error('nombre') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Descripción --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">Descripción</label>
                    <textarea 
                        wire:model.defer="descripcion"
                        rows="3"
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                        focus:outline-none focus:border-[#d4a656]"
                        placeholder="Ingresa una descripción"
                    ></textarea>
                    @error('descripcion') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Fecha y Hora --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Fecha</label>
                        <input 
                            type="date"
                            wire:model.defer="fecha"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                            focus:outline-none focus:border-[#d4a656]"
                        >
                        @error('fecha') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Hora</label>
                        <input 
                            type="text"
                            wire:model.defer="hora"
                            placeholder="18:00"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300 
                            focus:outline-none focus:border-[#d4a656]"
                        >
                        @error('hora') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Ubicación y Categoría--}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Ubicación</label>
                        <select 
                            wire:model.defer="ubicacion"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                            focus:outline-none focus:border-[#d4a656]"
                        >
                            <option value="">Seleccione...</option>
                            @foreach(App\Models\Evento::UBICACIONES as $ubi)
                                <option value="{{ $ubi }}">{{ ucfirst($ubi) }}</option>
                            @endforeach
                        </select>
                        @error('ubicacion') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Categoría</label>
                        <select 
                            wire:model.defer="categoria"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                            focus:outline-none focus:border-[#d4a656]"
                        >
                            <option value="">Seleccione...</option>
                            @foreach(App\Models\Evento::CATEGORIAS as $cat)
                                <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                            @endforeach
                        </select>
                        @error('categoria') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Precio y Capacidad --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Precio (S/)</label>
                        <input 
                            type="number"
                            wire:model.defer="precio"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                            focus:outline-none focus:border-[#d4a656]"
                        >
                        @error('precio') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-300 text-sm font-medium mb-1">Capacidad</label>
                        <input 
                            type="number"
                            wire:model.defer="capacidad"
                            class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                            focus:outline-none focus:border-[#d4a656]"
                        >
                        @error('capacidad') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Imagen --}}
                <div>
                    <label class="block text-gray-300 text-sm font-medium mb-1">URL de Imagen</label>
                    <input 
                        type="text"
                        wire:model.defer="imagen_principal"
                        placeholder="https://..."
                        class="w-full bg-[#141212] border border-[#2a2626] rounded-md p-3 text-gray-300
                        focus:outline-none focus:border-[#d4a656]"
                    >
                    @error('imagen_principal') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
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
                        Crear Evento
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
