<!-- Formulario Livewire -->
<form wire:submit.prevent="register" class="space-y-4">

    <!-- Nombre -->
    <div>
        <label class="block mb-1 font-medium">Nombre Completo</label>
        <input type="text" wire:model="name" required
            placeholder="Tu nombre"
            class="w-full p-2 rounded bg-white/10 text-white placeholder-white/40
                focus:outline-none focus:ring-2 focus:ring-yellow-600" />
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email -->
    <div>
        <label class="block mb-1 font-medium">Correo Electrónico</label>
        <input type="email" wire:model="email" required
            placeholder="tu@email.com"
            class="w-full p-2 rounded bg-white/10 text-white placeholder-white/40 
                focus:outline-none focus:ring-2 focus:ring-yellow-600" />
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div>
        <label class="block mb-1 font-medium">Contraseña</label>
        <input type="password" wire:model="password" required
            placeholder="Mínimo 6 caracteres"
            class="w-full p-2 rounded bg-white/10 text-white placeholder-white/40 
                focus:outline-none focus:ring-2 focus:ring-yellow-600" />
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Confirmación -->
    <div>
        <label class="block mb-1 font-medium">Confirmar Contraseña</label>
        <input type="password" wire:model="password_confirmation" required
            placeholder="Repite la contraseña"
            class="w-full p-2 rounded bg-white/10 text-white placeholder-white/40 
                focus:outline-none focus:ring-2 focus:ring-yellow-600" />
    </div>

    <!-- Botón -->
    <button type="submit"
        class="w-full bg-yellow-600 hover:bg-yellow-500 py-3 rounded text-black font-semibold transition">
        Crear Cuenta
    </button>
</form>
