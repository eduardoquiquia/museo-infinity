<nav class="border-b border-[#c9a961] flex justify-between items-center px-10 py-6 bg-black/80 fixed w-full top-0 z-50">
    <div class="flex items-center gap-3">
        <div class="w-6 h-6 border-2 rounded-b-full border-white rounded flex items-center justify-center">
            <span class="text-xm py">∞</span>
        </div>
        <span class="font-medium text-sm uppercase tracking-[0.25rem]">Museo Infinito</span>
    </div>

    <ul class="flex gap-8 text-sm">
        <li>
            <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
                Inicio
            </a>
        </li>

        <li>
            <a href="{{ route('exhibiciones') }}"
                class="{{ request()->routeIs('exhibiciones') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
                Exhibiciones
            </a>
        </li>

        <li>
            <a href="{{ route('salas-virtuales') }}"
                class="{{ request()->routeIs('salas-virtuales') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
                Salas Virtuales
            </a>
        </li>

        <li>
            <a href="{{ route('eventos') }}"
                class="{{ request()->routeIs('eventos') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
                Eventos
            </a>
        </li>

        <li>
            <a href="{{ route('restaurante') }}"
                class="{{ request()->routeIs('restaurante') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
                Restaurante
            </a>
        </li>

        <li>
            <a href="{{ route('sobre-nosotros') }}"
                class="{{ request()->routeIs('sobre-nosotros') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
                Sobre Nosotros
            </a>
        </li>

        <li>
            <a href="{{ route('contacto') }}"
                class="{{ request()->routeIs('contacto') ? 'text-[#c9a961]' : 'text-gray-400 hover:text-white' }}">
                Contacto
            </a>
        </li>
    </ul>

    <div class="flex gap-3">
        <!-- Comprar entrada siempre visible -->
        <button 
            wire:click="$dispatch('abrir-entrada-presencial')"
            class="bg-yellow-600 hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-lg transition"
        >
            Comprar Entrada
        </button>

        @guest
            <!-- Botón Login -->
            <button 
                wire:click="$dispatch('abrir-auth')"
                class="px-6 py-1 hover:text-yellow-500 text-sm bg-transparent border border-[#c9a961]/50 rounded-lg p-4 hover:bg-yellow-500/20 transition-colors duration-300"
            >
                Iniciar Sesión
            </button>
        @endguest

        @auth

            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('admin.panel') }}" 
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition">
                    Panel
                </a>
            @else
                <a href="{{ route('perfil') }}" 
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg transition">
                    Perfil
                </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    type="submit"
                    class="px-6 py-2 bg-red-600 hover:bg-red-500 text-white rounded-lg transition"
                >
                    Cerrar sesión
                </button>
            </form>
        @endauth
    </div>
</nav>
