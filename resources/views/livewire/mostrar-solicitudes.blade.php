<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @if (count($solicitudes) > 0)
    @foreach ($solicitudes as $solicitud)
    <div class="p-6 text-gray-900 bg-white md:flex justify-between items-center">
        <div class="leading-10">
            <a href="#" class="text-xl font-bold">
                @if ($solicitud->sala)
                Sala Solicitada: {{ $solicitud->sala->salas }}
                @else
                Sin sala asociada
                @endif
            </a>
            <p class="text-sm text-gray-600 font-bold">{{ $solicitud->email }}</p>
            <p class="text-sm text-gray-500">Fecha de Reservación: {{ $solicitud->fecha->format('d/m/Y') }} </p>
        </div>
        <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
            <a href="#" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Editar
            </a>
            <a href="#" class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                Eliminar
            </a>
        </div>
    </div>
    @endforeach
    @else
    <div class="p-6 text-gray-900 bg-white">
        <p class="text-xl font-bold">No tienes solicitudes actualmente</p>
    </div>
    @endif
</div>