<footer class="bg-black border-t border-gray-800 mt-16 py-12">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- Logo + descripción --}}
        <div>
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 flex justify-center items-center bg-gray-900 rounded-lg">
                    <span class="text-white text-2xl">∞</span>
                </div>
                <h2 class="text-lg font-normal text-white font-serif">Museo Infinito</h2>
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
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-yellow-500">
                        Inicio
                    </a>
                </li>

                <li>
                    <a href="{{ route('exhibiciones') }}" class="text-gray-400 hover:text-yellow-500">
                        Exhibiciones
                    </a>
                </li>

                <li>
                    <a href="{{ route('restaurante') }}" class="text-gray-400 hover:text-yellow-500">
                        Restaurante
                    </a>
                </li>

                <li>
                    <a href="{{ route('eventos') }}" class="text-gray-400 hover:text-yellow-500">
                        Eventos
                    </a>
                </li>

                <li>
                    <a href="{{ route('contacto') }}" class="text-gray-400 hover:text-yellow-500">
                        Contacto
                    </a>
                </li>
            </ul>
        </div>

        {{-- Redes Sociales --}}
        <div>
            <h3 class="text-white font-normal mb-4 font-serif">Síguenos</h3>

            <div class="flex space-x-4 mb-6">
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-gray-900 rounded-md hover:bg-gray-700">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-gray-900 rounded-md hover:bg-gray-700">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-gray-900 rounded-md hover:bg-gray-700">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="#" class="w-10 h-10 flex items-center justify-center bg-gray-900 rounded-md hover:bg-gray-700">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
            </div>

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

    <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-500 text-sm">
        © 2025 Museo Infinito. Todos los derechos reservados.
    </div>
</footer>
