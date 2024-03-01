<x-guest-layout>
  <form method="POST" action="{{ route('register') }}" novalidate>
    @csrf

    <x-input-error :messages="str_replace('name', 'Nombre', $errors->get('name'))" class="mt-2" />
    <x-input-error :messages="str_replace('email', 'correo electrónico', $errors->get('email'))" class="mt-2" />
    <x-input-error :messages="str_replace('password', 'contraseña', $errors->get('password'))" class="mt-2" />
    <x-input-error
      :messages="str_replace('password_confirmation', 'confirmar contraseña', $errors->get('password_confirmation'))"
      class="mt-2" />
    <!-- Name -->
    <div>
      <x-input-label for="name" :value="__('Nombre')" />
      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus
        autocomplete="name" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Correo Electrónico')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
        autocomplete="username" />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-input-label for="password" :value="__('Contraseña')" />

      <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="new-password" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

      <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
        required autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex justify-between my-5">
      <x-link href="{{ route('login') }}">
        Iniciar Sesión
      </x-link>

      <x-link href="{{ route('password.request') }}">
        Olvidaste tu contraseña
      </x-link>

    </div>
    <x-primary-button class="w-full justify-center">
      {{ __('Registrar') }}
    </x-primary-button>
  </form>
</x-guest-layout>