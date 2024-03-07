<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservacion;

class MostrarSolicitudesAdmin extends Component
{
    public function render()
    {
        $solicitudes = Reservacion::paginate(10);

        return view('livewire.mostrar-solicitudes-admin', [
            'solicitudes' => $solicitudes
        ]);
    }
}
