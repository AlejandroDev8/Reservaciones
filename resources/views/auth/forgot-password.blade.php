<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Olvidaste tu constraseña? Coloca tu correo electrónico de registro y enviaremos un enlace para que puedas crear una nueva') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <x-input-error :messages="str_replace('email', 'correo electrónico', $errors->get('email'))" class="mt-2" />
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class="flex justify-between my-5">
            <x-link
              href="{{ route('login') }}"
            >
              Iniciar Sesión
            </x-link>

            <x-link
                href="{{ route('register') }}"
            >
              Crear Cuenta
            </x-link>

          </div>
          <x-primary-button class="w-full justify-center">
            {{ __('Enviar Instrucciones') }}
        </x-primary-button>
    </form>
</x-guest-layout>
