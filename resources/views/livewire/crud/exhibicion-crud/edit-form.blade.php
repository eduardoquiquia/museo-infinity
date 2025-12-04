<div>
    @if ($open)
        <div class="fixed inset-0 z-50 flex items-center justify-center">

            {{-- Fondo oscuro --}}
            <div class="absolute inset-0 bg-black/70 backdrop-blur-sm" 
                wire:click="$set('open', false)">
            </div>

            {{-- Contenedor --}}
            <div class="relative bg-[#0f0b09] text-neutral-200 w-full max-w-2xl p-8 rounded-xl border border-[#3a2f28] shadow-xl z-50">

                {{-- Header --}}
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Editar Exhibición</h2>
                        <p class="text-neutral-400 text-sm">Actualiza los detalles de la exhibición</p>
                    </div>

                    <button 
                        wire:click="$set('open', false)"
                        class="text-neutral-400 hover:text-white text-xl px-2">
                        ×
                    </button>
                </div>

                {{-- FORMULARIO --}}
                <div class="space-y-4">

                    {{-- Título --}}
                    <div>
                        <label class="text-sm text-neutral-300">Título</label>
                        <input type="text" 
                            wire:model="titulo"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white 
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                    </div>

                    {{-- Descripción corta --}}
                    <div>
                        <label class="text-sm text-neutral-300">Descripción</label>
                        <textarea wire:model="descripcion" rows="3"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white 
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600"></textarea>
                    </div>

                    {{-- Categoría --}}
                    <div>
                        <label class="text-sm text-neutral-300">Categoría</label>
                        <select wire:model="categoria"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white 
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                            <option value="">Seleccione...</option>
                            <option value="Dinosaurios">Dinosaurios</option>
                            <option value="Mamiferos Extintos">Mamíferos Extintos</option>
                            <option value="Arte Rupestre">Arte Rupestre</option>
                            <option value="Herramientas Antiguas">Herramientas Antiguas</option>
                        </select>
                    </div>

                    {{-- Imagen principal --}}
                    <div>
                        <label class="text-sm text-neutral-300">Imagen principal (URL)</label>
                        <input type="text"
                            wire:model="imagen_principal"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                    </div>

                    {{-- Imagen 360 --}}
                    <div>
                        <label class="text-sm text-neutral-300">Imagen 360 (URL) <span class="text-neutral-500">(Opcional)</span></label>
                        <input type="text"
                            wire:model="imagen_360"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                    </div>

                    {{-- Periodo --}}
                    <div>
                        <label class="text-sm text-neutral-300">Periodo</label>
                        <select wire:model="periodo"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white 
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                            <option value="">Seleccione...</option>
                            <option value="Periodo Triásico">Periodo Triásico</option>
                            <option value="Periodo Jurásico">Periodo Jurásico</option>
                            <option value="Periodo Cretácico">Periodo Cretácico</option>
                        </select>
                    </div>

                    {{-- Fecha de descubrimiento --}}
                    <div>
                        <label class="text-sm text-neutral-300">Fecha de descubrimiento</label>
                        <input type="date"
                            wire:model="fecha_descubrimiento"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                    </div>

                    {{-- Lugar de hallazgo --}}
                    <div>
                        <label class="text-sm text-neutral-300">Lugar del hallazgo</label>
                        <input type="text"
                            wire:model="lugar_hallazgo"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                    </div>

                    {{-- Descripción detallada --}}
                    <div>
                        <label class="text-sm text-neutral-300">Descripción detallada</label>
                        <textarea wire:model="descripcion_detallada" rows="4"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white 
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600"></textarea>
                    </div>

                    {{-- Destacada --}}
                    <div>
                        <label class="text-sm text-neutral-300">¿Es destacada?</label>
                        <select wire:model="destacada"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                            <option value="">Seleccione...</option>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    {{-- Estado --}}
                    <div>
                        <label class="text-sm text-neutral-300">Estado</label>
                        <select wire:model="estado"
                            class="w-full mt-1 bg-transparent border border-[#5c4a3e] text-white
                                p-2 rounded focus:ring-1 focus:ring-yellow-600 focus:border-yellow-600">
                            <option value="Publicado">Publicado</option>
                            <option value="Borrador">Borrador</option>
                            <option value="Archivado">Archivado</option>
                        </select>
                    </div>
                </div>

                {{-- FOOTER --}}
                <div class="flex justify-end mt-8 gap-3">
                    <button 
                        wire:click="$set('open', false)"
                        class="px-5 py-2 rounded-lg bg-neutral-700 hover:bg-neutral-600 text-white font-semibold transition">
                        Cancelar
                    </button>

                    <button 
                        wire:click="actualizar"
                        class="px-5 py-2 rounded-lg bg-yellow-600 hover:bg-yellow-500 text-black font-semibold transition">
                        Actualizar
                    </button>
                </div>

            </div>

        </div>
    @endif
</div>
