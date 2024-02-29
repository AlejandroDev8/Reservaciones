<form class="md:w-1/2 space-y-5">
    <h1 class="font-bold text-lg mb-3">Formulario de Reservación</h1>
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
            <option value="" disabled selected>-- Seleccione una sala --</option>
            <option value="1">Sala Rafael Piña</option>
            <option value="2">Sala de Ex-Directores</option>
            <option value="3">Auditorio</option>
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
            <option value="1">Acomodo en "U"</option>
            <option value="2">Acomodo tipo Mesas y Sillas</option>
            <option value="3">Acomodo tipo Conferencia</option>
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