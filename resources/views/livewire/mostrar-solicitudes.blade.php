<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
  @if (count($solicitudes) > 0)
  @foreach ($solicitudes as $solicitud)
  <div class="p-6 text-gray-900 bg-white md:flex justify-between items-center">
    <div class="leading-10 space-y-3">
      <h2 class="text-xl font-bold">
        @if ($solicitud->sala)
        Sala Solicitada: <span class="text-indigo-600 normal-case font-normal">{{ $solicitud->sala->salas }}</span>
        @else
        Sin sala asociada
        @endif
      </h2>
      <p class="text-sm text-gray-600 font-bold">Correo electrónico asociado: <span
          class="text-indigo-600 normal-case">{{ $solicitud->email }}</span></p>
      <p class="text-sm text-gray-500 font-bold">Fecha de Reservación: <span class="text-indigo-600 normal-case">{{
          $solicitud->fecha->format('d/m/Y') }}</span> </p>
    </div>
    <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
      <a href="{{route('reservaciones.edit', $solicitud->id)}}"
        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
        Editar
      </a>
      <button wire:click="$dispatch('mostrarAlerta', {{ $solicitud->id }})"
        class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
        Eliminar
      </button>
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
  Livewire.on('mostrarAlerta', solicitudId => {
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
      @this.call('eliminarSolicitud', solicitudId)
      Swal.fire(
        'Solicitud eliminada correctamente!',
          'Tu solicitud ha sido eliminada.',
        'success'
      )
    }
  })
  })

</script>
@endpush