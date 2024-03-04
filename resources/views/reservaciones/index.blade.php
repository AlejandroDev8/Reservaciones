<x-app-layout>
    @auth
    @if (auth()->user()->rol === 0)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Solicitudes') }}
        </h2>
    </x-slot>
    @else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todas las Solicitudes') }}
        </h2>
    </x-slot>
    @endif
    @endauth
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
            <div class="uppercase border-green-600 bg-green-100 text-gray-600 font-bold p-2 my-3">
                {{ session('message') }}
            </div>
            @endif
            <livewire:mostrar-solicitudes />
        </div>
    </div>
</x-app-layout>