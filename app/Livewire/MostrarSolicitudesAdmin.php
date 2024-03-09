<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservacion;

class MostrarSolicitudesAdmin extends Component
{
    public $sala;
    public $acomodo;
    public $user;
    public $estado;

    protected $listeners = ['filtrarSolicitudes' => 'buscar'];

    public function buscar($sala, $acomodo, $user, $estado)
    {
        $this->sala = $sala;
        $this->acomodo = $acomodo;
        $this->user = $user;
        $this->estado = $estado;
    }

    public function render()
    {
        $solicitudes = Reservacion::all();

        return view('livewire.mostrar-solicitudes-admin', [
            'solicitudes' => $solicitudes
        ]);
    }
}
