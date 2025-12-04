@if($isOpen)
<div 
    class="fixed inset-0 z-[200] flex items-center justify-center bg-black/70 backdrop-blur-sm"
    wire:keydown.escape.window="close"
    wire:click.self="close"
>
    <div 
        class="bg-black text-white w-full max-w-md p-6 rounded-xl border border-white/10"
        wire:click.stop
    >
        {{-- Header --}}
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">
                {{ $tab === 'login' ? 'Accede a tu cuenta' : 'Crea tu cuenta' }}
            </h2>
            <button wire:click="close" class="text-white/70 hover:text-white">✕</button>
        </div>

        {{-- Subtítulo --}}
        <p class="text-white/70 mb-6">
            {{ $tab === 'login' ? 'Inicia sesión para continuar' : 'Regístrate para continuar' }}
        </p>

        {{-- Tabs --}}
        <div class="flex mb-6 bg-white/10 rounded-lg overflow-hidden">
            <button 
                wire:click="switchTab('login')" 
                class="w-1/2 py-2 {{ $tab === 'login' ? 'bg-white/20 text-white font-semibold' : 'text-white/70' }}">
                Iniciar Sesión
            </button>
            <button 
                wire:click="switchTab('register')" 
                class="w-1/2 py-2 {{ $tab === 'register' ? 'bg-white/20 text-white font-semibold' : 'text-white/70' }}">
                Registrarse
            </button>
        </div>

        {{-- Contenido dinámico --}}
        @if ($tab === 'login')
            <livewire:componentes.auth-component.login :key="'login-'.now()" />
        @else
            <livewire:componentes.auth-component.register :key="'register-'.now()" />
        @endif
    </div>
</div>
@endif