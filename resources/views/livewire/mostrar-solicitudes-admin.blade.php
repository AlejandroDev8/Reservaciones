<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @if (count($solicitudes) > 0)
    @foreach ($solicitudes as $solicitud)
    <div class="p-6 text-gray-900 bg-white md:flex justify-between items-center">
        <div class="leading-10 space-y-3">
            <p class="text-sm text-gray-600 font-bold">ID: {{$solicitud->id}} </p>
            <h2 class=" text-xl font-bold">
                @if ($solicitud->sala)
                Sala Solicitada: <span class="text-indigo-600 normal-case font-normal">{{ $solicitud->sala->salas
                    }}</span>
                @else
                Sin sala asociada
                @endif
            </h2>
            <p class="text-sm text-gray-600 font-bold">Nombre del solicitante: <span
                    class="text-indigo-600 normal-case">{{$solicitud->user->name}}</span></p>
            <p class="text-sm text-gray-600 font-bold">Correo electrónico asociado: <span
                    class="text-indigo-600 normal-case">{{ $solicitud->email }}</span></p>
            <p class="text-sm text-gray-500 font-bold">Fecha de Reservación: <span
                    class="text-indigo-600 normal-case">{{
                    $solicitud->fecha->format('d/m/Y') }}</span> </p>
            <p>Estado: <span class="text-indigo-600 normal-case">{{$solicitud->estados->estados}}</span></p>
        </div>
        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
            @if ($solicitud->estado_id === 1)
            <button wire:click='aceptarSolicitud({{$solicitud->id}})'
                class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Aceptar
            </button>
            <button wire:click="rechazarSolicitud({{ $solicitud->id }})"
                class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Rechazar
            </button>
            @else
            <button wire:click="regresarSolicitud({{ $solicitud->id }})"
                class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Regresarla a estado pendiente
            </button>
            @endif
        </div>
    </div>
    <hr>
    @endforeach
    @else
    <div class="p-6 text-gray-900 bg-white">
        <p class="text-xl font-bold">No hay solicitudes actualmente</p>
    </div>
    @endif
    <div class="mt-10">
        {{ $solicitudes->links() }}
    </div>
</div>