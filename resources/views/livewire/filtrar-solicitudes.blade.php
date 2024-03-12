<div class="bg-gray-100 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-700 text-center font-extrabold my-5">Buscar y Filtrar Solicitudes</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent="filtrarSolicitudes">
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold " for="termino">
                        Usuario
                    </label>
                    <select class="border-gray-300 p-2 w-full" wire:model='user'>
                        <option>--Seleccione--</option>

                        @foreach ($users as $user)
                        @if ($user->rol == 0)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                        @endforeach

                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Sala</label>
                    <select class="border-gray-300 p-2 w-full" wire:model='sala'>
                        <option>--Seleccione--</option>

                        @foreach ($salas as $sala )
                        <option value="{{ $sala->id }}">{{ $sala->salas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Estado de la Solicitud</label>
                    <select class="border-gray-300 p-2 w-full" wire:model='estado'>
                        <option>-- Seleccione --</option>
                        @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}">{{$estado->estados}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Buscar" />
            </div>
        </form>
    </div>
</div>