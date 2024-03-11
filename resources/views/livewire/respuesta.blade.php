<div class="md:w-1/2 space-y-5">
    <div>
        <x-input-label for="email" :value="__('Correo Electrónico')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email"
            placeholder="Correo electrónico para mandar la confirmación de la reservación" disabled />
    </div>
    <div>
        <x-input-label for="sala" :value="__('Sala Seleccionada')" />
        <select wire:model="sala" id="sala"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full"
            disabled>
            <option value="" disabled selected>-- Seleccione una sala --</option>
            @foreach ($salas as $sala)
            <option value="{{$sala->id}}">{{$sala->salas}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <x-input-label for="fecha_inicio" :value="__('Seleccione una Fecha de inicio')" />
        <x-text-input id="fecha_inicio" class="block mt-1 w-full" type="date" wire:model="fecha_inicio"
            :value="old('fecha_inicio')" min="{{$minDate}}" max="{{$maxDate}}" disabled />
        @error('fecha_inicio')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="fecha_fin" :value="__('Seleccione una Fecha de fin')" />
        <x-text-input id="fecha_fin" class="block mt-1 w-full" type="date" wire:model="fecha_fin"
            :value="old('fecha_fin')" min="{{$minDate}}" max="{{$maxDate}}" disabled />
        @error('fecha_fin')
        <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <div>
        <x-input-label for="sillas" :value="__('Acomodo de Sillas')" />
        <select wire:model="acomodo" id="sillas"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full"
            disabled>
            <option value="" disabled selected>-- Seleccione un acomodo --</option>
            @foreach ($acomodos as $acomodo)
            <option value="{{$acomodo->id}}">{{$acomodo->acomodo}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <x-input-label for="extras" :value="__('Especificaciones extras')" />
        <textarea wire:model="extras" id="extras" cols="30" rows="10"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full"
            placeholder="Especificacione extras para añadir a la sala (Limpieza, más sillas y/o mesas, etc..)"
            disabled></textarea>
    </div>
    <div>
        <form>
            <div>
                <x-input-label for="respuesta" :value="__('Motivos de aceptación o rechazo de la solicitud')" />
                <textarea wire:model="respuesta" id="respuesta" cols="30" rows="10"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full"
                    placeholder="Motivos de aceptación o rechazo de la solicitud"></textarea>
            </div>
            <div class="flex justify-between mt-5 md:gap-5 gap-5">
                <x-primary-button wire:click="aceptarSolicitud({{ $reservacion_id }})">
                    {{ __('Aceptar Solicitud') }}
                </x-primary-button>
                <x-danger-button wire:click="rechazarSolicitud({{ $reservacion_id }})">
                    {{ __('Rechazar Solicitud') }}
                </x-danger-button>
            </div>
        </form>
    </div>
</div>