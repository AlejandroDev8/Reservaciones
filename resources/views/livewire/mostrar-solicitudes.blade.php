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
            <a href="{{route('reservaciones.edit', $solicitud->id)}}"
                class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
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
    <div class="mt-10">
        {{ $solicitudes->links() }}
    </div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
  title: '¿Estás seguro de eliminar la solicitud?',
  text: "No podrás revertir esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí, eliminar!',
    cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Solicitud eliminada correctamente!',
        'Tu solicitud ha sido eliminada.',
      'success'
    )
  }
})
</script>
@endpush