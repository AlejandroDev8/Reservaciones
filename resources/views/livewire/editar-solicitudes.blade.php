<form class="md:w-1/2 space-y-5" wire:submit.prevent='editarSolicitud'>
    <h1 class="font-bold text-lg mb-3">Formulario de Reservación</h1>
    {{--
    <x-input-error :messages="str_replace('email', 'correo electrónico', $errors->get('email'))" class="mt-2" /> --}}
    <div>
        <x-input-label for="email" :value="__('Correo Electrónico')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email"
            placeholder="Correo electrónico para mandar la confirmación de la reservación" />
        @error('email')
        <livewire:mostrar-alerta :message="str_replace('email', 'correo electrónico', $message)" />
        @enderror
    </div>
    <div>
        <x-input-label for="sala" :value="__('Seleccione una sala')" />
        <select wire:model="sala" id="sala"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full">
            <option value="" disabled selected>-- Seleccione una sala --</option>
            @foreach ($salas as $sala)
            <option value="{{$sala->id}}">{{$sala->salas}}</option>
            @endforeach
        </select>
        @error('sala')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="sillas" :value="__('Seleccione el acomodo de sillas')" />
        <select wire:model="acomodo" id="sillas"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full">
            <option value="" disabled selected>-- Seleccione un acomodo --</option>
            @foreach ($acomodos as $acomodo)
            <option value="{{$acomodo->id}}">{{$acomodo->acomodo}}</option>
            @endforeach
        </select>
        @error('acomodo')
        <livewire:mostrar-alerta :message="str_replace('acomodo', 'acomo de de sillas', $message)" />
        @enderror
    </div>
    <div>
        <x-input-label for="extras" :value="__('Especificaciones extras')" />
        <textarea wire:model="extras" id="extras" cols="30" rows="10"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full"
            placeholder="Especificacione extras para añadir a la sala (Limpieza, más sillas y/o mesas, etc..)"></textarea>
        @error('extras')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <x-primary-button>
        {{ __('Editar Solicitud') }}
    </x-primary-button>
</form>