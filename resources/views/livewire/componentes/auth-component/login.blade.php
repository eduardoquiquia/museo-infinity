<!-- Formulario Livewire -->
<form wire:submit.prevent="login" class="space-y-4">

    <!-- Email -->
    <div>
        <label class="block mb-1 font-medium">Correo Electrónico</label>
        <input type="email" wire:model="email" required
            placeholder="tu@email.com"
            class="w-full p-2 rounded bg-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-yellow-600" />
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div>
        <label class="block mb-1 font-medium">Contraseña</label>
        <input type="password" wire:model="password" required
            placeholder="••••••"
            class="w-full p-2 rounded bg-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-yellow-600" />
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Remember me -->
    <div class="flex items-center gap-2 text-white/80">
        <input type="checkbox" wire:model="remember" class="accent-yellow-600">
        <label>Recordarme</label>
    </div>

    <!-- Botón -->
    <button type="submit"
        class="w-full bg-yellow-600 hover:bg-yellow-500 py-3 rounded text-black font-semibold transition">
        Iniciar Sesión
    </button>
</form>
