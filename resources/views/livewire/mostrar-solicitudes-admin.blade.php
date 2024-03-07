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
            <p class="text-sm text-gray-500 font-bold">Fecha de Inicio de la Reservación:
                <span class="text-indigo-600 normal-case">
                    {{ \Carbon\Carbon::parse($solicitud->fecha_inicio)->format('d/m/Y') }}
                </span>
            </p>
            <p class="text-sm text-gray-500 font-bold">Fecha de Fin de la Reservación:
                <span class="text-indigo-600 normal-case">
                    {{ \Carbon\Carbon::parse($solicitud->fecha_fin)->format('d/m/Y') }}
                </span>
            </p>
            <p>Estado: <span class="text-indigo-600 normal-case">{{$solicitud->estados->estados}}</span></p>
        </div>
        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
            @if ($solicitud->estado_id === 1)
            <a href="{{route('reservaciones.respuesta', $solicitud->id)}}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Ver Solicitud
            </a>
            {{-- <form wire:submit.prevent='aceptarSolicitud({{$solicitud->id}})'>
                <x-primary-button>
                    Aceptar
                </x-primary-button>
            </form>
            <x-danger-button wire:click="rechazarSolicitud({{ $solicitud->id }})">
                Rechazar
            </x-danger-button> --}}
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