<x-app-layout>
  <div class="py-16 overflow-hidden lg:py-24 w-full">
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
      @guest
      <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-900">Inicar
        Sesión</a>

      @if (Route::has('register'))
      <a href="{{ route('register') }}" class="ml-4 font-semibold text-indigo-600 hover:text-indigo-900">Registrarse</a>
      @endif
      @endguest
    </div>
    @endif
    <div class=" max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
      <div class="relative">
        <h2 class="text-center text-4xl leading-8 font-extrabold tracking-tight text-indigo-600 sm:text-6xl">Haz tu
          reservaciones para el uso de las salas del TecNM-Ciudad Valles</h2>
        <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-500">
          El Tecnológico Nacional de México en Ciudad Valles, pone a disposición de la comunidad estudiantil y docente
          las salas de estudio, para que puedan realizar sus actividades académicas.
        </p>
      </div>
    </div>
  </div>
</x-app-layout>