<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    @foreach ($solicitudes as $solicitud)
    <div class="p-6 text-gray-900">
        <div class="leading-10">
            <a href="#" class="text-xl font-bold">
                {{$solicitud->fecha}}
            </a>
        </div>
    </div>
    @endforeach
</div>