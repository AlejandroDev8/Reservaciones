<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservacion;

class MostrarSolicitudesAdmin extends Component
{
    public function render()
    {
        $solicitudes = Reservacion::all();

        return view('livewire.mostrar-solicitudes-admin', [
            'solicitudes' => $solicitudes
        ]);
    }
}
