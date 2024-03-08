<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">Solicitudes</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($solicitudes as $solicitud)
                <div class="md:flex md:justify-between md:items-center py-5">
                    <div class="md:flex-1">
                        <a href="{{route('reservaciones.respuesta', $solicitud->id)}}"
                            class="text-3xl font-extrabold text-gray-600 mb-1">Sala Solicitada:
                            <span class="text-indigo-600 normal-case">
                                {{ $solicitud->sala->salas}}
                            </span>
                        </a>
                        <p class="text-base text-gray-600 mb-1">Nombre del solicitante:
                            <span class="text-indigo-600 normal-case">{{$solicitud->user->name}}</span>
                        </p>
                        <p class="text-base text-gray-600 mb-1">Correo electrónico asociado: <span
                                class="text-indigo-600 normal-case">{{ $solicitud->email }}</span></p>
                        <p class="text-base text-gray-600 mb-1">Fecha de Inicio de la Reservación:
                            <span class="text-indigo-600 normal-case">
                                {{ \Carbon\Carbon::parse($solicitud->fecha_inicio)->format('d/m/Y') }}
                            </span>
                        </p>
                        <p class="text-base text-gray-600 mb-1">Fecha de Fin de la Reservación:
                            <span class="text-indigo-600 normal-case">
                                {{ \Carbon\Carbon::parse($solicitud->fecha_fin)->format('d/m/Y') }}
                            </span>
                        </p>
                        <p class="text-base text-gray-600 mb-1">Estado:
                            <span class="text-indigo-600 normal-case">
                                {{$solicitud->estados->estados}}
                            </span>
                        </p>
                    </div>
                    <div class="mt-5 md:mt-0">
                        <a href="{{route('reservaciones.respuesta', $solicitud->id)}}"
                            class="items-center px-4 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 block text-center">Ver
                            Solicitud</a>
                    </div>
                </div>
                @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay Solicitudes aún</p>
                @endforelse
            </div>
        </div>
    </div>
</div>