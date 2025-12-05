<footer class="bg-black border-t border-gray-800 mt-0 py-12">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- Logo + descripción --}}
        <div>
            <div class="flex items-center space-x-3">
                <div class="w-6 h-6 border-2 rounded-b-full border-white rounded flex items-center justify-center">
                    <span class="text-xm py">∞</span>
                </div>
                <h2 class="font-medium text-sm uppercase tracking-[0.25rem]">Museo Infinito</h2>
            </div>

            <p class="mt-4 text-gray-400 text-sm">
                "Preservamos el pasado para inspirar el futuro"
            </p>
        </div>

        {{-- Enlaces Rápidos --}}
        <div>
            <h3 class="text-white font-normal mb-4 font-serif">Enlaces Rápidos</h3>
            <ul class="space-y-2 text-sm">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-[#c9a961]">
                        Inicio
                    </a>
                </li>

                <li>
                    <a href="{{ route('exhibiciones') }}" class="text-gray-400 hover:text-[#c9a961]">
                        Exhibiciones
                    </a>
                </li>

                <li>
                    <a href="{{ route('restaurante') }}" class="text-gray-400 hover:text-[#c9a961]">
                        Restaurante
                    </a>
                </li>

                <li>
                    <a href="{{ route('eventos') }}" class="text-gray-400 hover:text-[#c9a961]">
                        Eventos
                    </a>
                </li>

                <li>
                    <a href="{{ route('contacto') }}" class="text-gray-400 hover:text-[#c9a961]">
                        Contacto
                    </a>
                </li>
            </ul>
        </div>

        {{-- Redes Sociales --}}
        <div class="flex flex-col justify-between h-full">

            <!-- Título -->
            <h3 class="text-white font-normal mb-4 font-serif">Síguenos</h3>

            <!-- Redes -->
            <div class="flex space-x-4 mb-6">
                <!-- Facebook -->
                <a href="#" 
                    class="w-10 h-10 flex items-center justify-center 
                        bg-[#c9a961]/10 border border-[#c9a961]/50
                        rounded-none hover:bg-[#c9a961]/20 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" 
                        class="w-5 h-5 text-gray-400" viewBox="0 0 24 24">
                        <path d="M22 12.07C22 6.48 17.52 2 12 2S2 
                        6.48 2 12.07c0 5 3.66 9.14 8.44 9.93v-7.03H8.08v-2.9h2.36V9.41
                        c0-2.33 1.38-3.62 3.52-3.62 1.02 0 2.09.18 2.09.18v2.3h-1.18
                        c-1.16 0-1.52.72-1.52 1.46v1.75h2.59l-.41 2.9h-2.18v7.03A10 10 0 0 0 22 12.07z"/>
                    </svg>
                </a>

                <!-- Instagram -->
                <a href="#" 
                    class="w-10 h-10 flex items-center justify-center 
                        bg-[#c9a961]/10 border border-[#c9a961]/50
                        rounded-none hover:bg-[#c9a961]/20 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        stroke="currentColor" stroke-width="1.5"
                        class="w-5 h-5 text-gray-400" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M7.75 2.75h8.5A5 5 0 0 1 21.25 7.75v8.5a5 5 0 0 1-5 5h-8.5a5 5 0 0 1-5-5v-8.5a5 5 0 0 1 5-5Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M12 8.75a3.25 3.25 0 1 0 0 6.5 3.25 3.25 0 0 0 0-6.5Z"/>
                        <circle cx="16.25" cy="7.75" r="0.75" fill="currentColor"/>
                    </svg>
                </a>

                <!-- YouTube -->
                <a href="#" 
                    class="w-10 h-10 flex items-center justify-center 
                        bg-[#c9a961]/10 border border-[#c9a961]/50
                        rounded-none hover:bg-[#c9a961]/20 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="w-5 h-5 text-gray-400" viewBox="0 0 24 24">
                        <path d="M19.6 3.2H4.4A4.39 4.39 0 0 0 0 7.6v8.8a4.39 
                        4.39 0 0 0 4.4 4.4h15.2a4.39 4.39 0 0 0 4.4-4.4V7.6a4.39 
                        4.39 0 0 0-4.4-4.4Zm-9.6 13V7l6.4 4.6Z"/>
                    </svg>
                </a>

                <!-- X / Twitter -->
                <a href="#" 
                    class="w-10 h-10 flex items-center justify-center 
                        bg-[#c9a961]/10 border border-[#c9a961]/50
                        rounded-none hover:bg-[#c9a961]/20 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="w-5 h-5 text-gray-400" viewBox="0 0 24 24">
                        <path d="M18.36 2H21l-6.12 7.02L22 22h-7.1l-4.6-6.8L4.9 
                        22H2l6.52-7.48L2 2h7.2l4.2 6.3L18.36 2Z"/>
                    </svg>
                </a>
            </div>

            <!-- Contacto alineado bonito -->
            <div class="space-y-3 text-gray-400 text-sm">
                <p class="flex items-center space-x-2">
                    <span>📍</span>
                    <span>Av. Prehistoria 123, Ciudad</span>
                </p>
                <p class="flex items-center space-x-2">
                    <span>📞</span>
                    <span>+34 900 123 456</span>
                </p>
                <p class="flex items-center space-x-2">
                    <span>📧</span>
                    <span>info@museoinfinito.com</span>
                </p>
            </div>
        </div>
        </div>

    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500 text-sm w-full">
        © 2025 Museo Infinito. Todos los derechos reservados.
    </div>

    </footer>

