<?php

namespace App\Livewire;

use App\Models\Reservacion;
use App\Models\Sala;
use Livewire\Component;

class MostrarSolicitudes extends Component
{
    public function render()
    {
        $solicitudes = Reservacion::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-solicitudes', [
            'solicitudes' => $solicitudes
        ]);
    }
}
