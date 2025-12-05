<form wire:submit.prevent="login" class="space-y-4">

    <!-- Email -->
    <div>
        <label class="block mb-1 font-normal">Correo Electrónico</label>
        <input type="email" wire:model="email" required
            placeholder="tu@email.com"
            class="w-full p-2 rounded bg-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#c9a961]/50" />
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div>
        <label class="block mb-1 font-normal">Contraseña</label>
        <input type="password" wire:model="password" required
            placeholder="••••••"
            class="w-full p-2 rounded bg-white/10 text-white placeholder-white/40 focus:outline-none focus:ring-2 focus:ring-[#c9a961]/50" />
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Remember me -->
    <div class="flex items-center gap-2 text-white/80">
        <input type="checkbox" wire:model="remember" class="accent-[#c9a961]">
        <label>Recordarme</label>
    </div>

    <!-- Botón -->
    <button type="submit"
        class="w-full bg-[#c9a961] hover:bg-[#c3a961]/90 py-3 rounded-none text-black font-semibold transition">
        Iniciar Sesión
    </button>
</form>
