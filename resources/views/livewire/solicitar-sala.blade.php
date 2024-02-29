<form class="md:w-1/2 space-y-5" novalidate>
    @csrf
    <h1 class="font-bold text-lg mb-3">Formulario de Reservación</h1>
    <x-input-error :messages="str_replace('email', 'correo electrónico', $errors->get('email'))" class="mt-2" />
    <div>
        <x-input-label for="email" :value="__('Correo Eléctronico')" />
        <x-text-input
            id="email"
            class="block mt-1 w-full"
            type="email"
            name="email"
            :value="old('email')"
        />
    </div>
    <div>
        <x-input-label for="sala" :value="__('Seleccione una sala')" />
        <select
            name="salas"
            id="sala"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full"
        >
            <option disabled selected>-- Seleccione una sala --</option>
            @foreach ($salas as $sala)
                <option value="{{$sala->id}}">{{$sala->salas}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <x-input-label for="fecha" :value="__('Seleccione una Fecha')"/>
        <x-text-input
            id="fecha"
            class="block mt-1 w-full"
            type="date"
            name="fecha"
            :value="old('fecha')"
        />
    </div>
    <div>
        <x-input-label for="sillas" :value="__('Seleccione el acamodo de sillas')" />
        <select
            name="sillas"
            id="sillas"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full"
        >
            <option value="" disabled selected>-- Seleccione un acomodo --</option>
            @foreach ($acomodos as $acomodo)
                <option value="{{$acomodo->id}}">{{$acomodo->acomodo}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <x-input-label for="extras" :value="__('Especificaciones extras')" />
        <textarea
            name="extras"
            id="extras"
            cols="30"
            rows="10"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 w-full" placeholder="Especificacione extras para añadir a la sala (Limpieza, más sillas y/o mesas, etc..)"
        ></textarea>
    </div>
    <x-primary-button>
        {{ __('Enviar Solicitud') }}
    </x-primary-button>
</form>