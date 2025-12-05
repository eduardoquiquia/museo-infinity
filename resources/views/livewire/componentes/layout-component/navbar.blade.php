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
            class="bg-[#c9a961] hover:bg-[#c3a961]/90 text-black font-normal text-sm px-4 py-2.5 rounded-none transition"
        >   
            Comprar Entrada
        </button>

        @guest
            <!-- Botón Login -->
            <button 
                wire:click="$dispatch('abrir-auth')"
                class="px-6 py-1 hover:text-[#c9a961] text-sm bg-transparent border border-[#c9a961]/50 rounded-none p-4 hover:bg-yellow-500/20 transition-colors duration-300"
            >
                Iniciar Sesión
            </button>
        @endguest

        @auth

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('panel') }}" 

                    class="px-6 py-2 border border-[#c9a961]/50 hover:bg-[#c9a961]/10 text-gray-400 rounded-none transition">

                    Panel
                </a>
            @else
            <a href="{{ route('perfil') }}" 
                class="flex items-center gap-2 px-4 py-2 border border-[#c9a961]/50 rounded-none 
                    hover:bg-[#c9a961]/10 transition">
                
                <!-- Ícono de usuario -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                    stroke-width="1.5" stroke="#9ca3af" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>

                <!-- Texto -->
                <span class="text-gray-400 font-medium">Tú</span>
            </a>

            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <button 
                type="submit"
                class="p-2 hover:bg-[#c9a961]/10 transition flex items-center justify-center border border-[#c9a961]/50 rounded-none"
                title="Cerrar sesión"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="#9ca3af" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25c0-.69-.56-1.25-1.25-1.25H6.5c-.69 0-1.25.56-1.25 1.25v13.5c0 .69.56 1.25 1.25 1.25h8c.69 0 1.25-.56 1.25-1.25V15m-6 0l-3-3m0 0l3-3m-3 3h12.75" />
                </svg>
            </button>
            </form>
        @endauth
    </div>
</nav>
