<div>
    @if ($open)
        <div class="fixed inset-0 z-50 flex items-center justify-center">

            {{-- Fondo --}}
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" 
                wire:click="cerrarModal">
            </div>

            {{-- Contenido --}}
            <div class="relative bg-[#0f0b09] text-neutral-200 w-full max-w-2xl p-8 rounded-xl border border-[#3a2f28] shadow-xl z-50">

                {{-- Header --}}
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Nuevo Evento</h2>
                        <p class="text-neutral-400 text-sm">Crea un nuevo evento</p>
                    </div>

                    <button 
                        wire:click="cerrarModal"
                        class="text-neutral-400 hover:text-white text-xl px-2">
                        ×
                    </button>
                </div>

                {{-- FORM --}}
                <div class="space-y-4">

                    {{-- Título --}}
                    <div>
                        <label class="text-sm text-neutral-300">Título del Evento</label>
                        <input type="text" 
                            wire:model="nombre"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                    </div>

                    {{-- Descripción --}}
                    <div>
                        <label class="text-sm text-neutral-300">Descripción</label>
                        <textarea 
                            wire:model="descripcion"
                            rows="4"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600"></textarea>
                    </div>

                    {{-- Fecha y Hora --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-neutral-300">Fecha</label>
                            <input type="date" 
                                wire:model="fecha"
                                class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                        </div>

                        <div>
                            <label class="text-sm text-neutral-300">Hora</label>
                            <input type="text" 
                                wire:model="hora"
                                placeholder="18:00"
                                class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                        </div>
                    </div>

                    {{-- Ubicación --}}
                    <div>
                        <label class="text-sm text-neutral-300">Ubicación</label>
                        <select 
                            wire:model="ubicacion"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                            <option value="">Seleccione...</option>
                            <option value="Sala principal">Sala principal</option>
                            <option value="Auditorio">Auditorio Principal</option>
                            <option value="Jardin">Jardín</option>
                            <option value="Sala exposiciones">Sala Exposiciones</option>
                        </select>
                    </div>

                    {{-- Categoría --}}
                    <div>
                        <label class="text-sm text-neutral-300">Categoría</label>
                        <select 
                            wire:model="categoria"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                            <option value="">Seleccione...</option>
                            <option value="Concierto">Concierto</option>
                            <option value="Exposicion">Exposición</option>
                            <option value="Taller">Taller</option>
                            <option value="Conferencia">Conferencia</option>
                        </select>
                    </div>

                    {{-- Precio y Capacidad --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm text-neutral-300">Precio (S/)</label>
                            <input type="number" 
                                wire:model="precio"
                                class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                        </div>

                        <div>
                            <label class="text-sm text-neutral-300">Capacidad</label>
                            <input type="number" 
                                wire:model="capacidad"
                                class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                        </div>
                    </div>

                    {{-- Imagen --}}
                    <div>
                        <label class="text-sm text-neutral-300">URL de Imagen</label>
                        <input type="text" 
                            wire:model="imagen_principal"
                            placeholder="https://..."
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                    </div>
                </div>

                {{-- FOOTER --}}
                <div class="flex justify-end mt-8 gap-3">
                    <button 
                        wire:click="cerrarModal"
                        class="px-5 py-2 rounded-lg bg-neutral-700 hover:bg-neutral-600 text-white font-semibold transition">
                        Cancelar
                    </button>

                    <button 
                        wire:click="crearEvento"
                        class="px-5 py-2 rounded-lg bg-yellow-600 hover:bg-yellow-500 text-black font-semibold transition">
                        Crear
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
