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

    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($sala, $acomodo, $user, $estado)
    {
        $this->sala = $sala;
        $this->acomodo = $acomodo;
        $this->user = $user;
        $this->estado = $estado;
    }

    public function render()
    {
        // $solicitudes = Reservacion::all();

        $solicitudes = Reservacion::where('sala_id', 'like', '%' . $this->sala . '%')
            ->where('acomodo_id', 'like', '%' . $this->acomodo . '%')
            ->where('user_id', 'like', '%' . $this->user . '%')
            ->where('estado_id', 'like', '%' . $this->estado . '%')
            ->get();

        return view('livewire.mostrar-solicitudes-admin', [
            'solicitudes' => $solicitudes
        ]);
    }
}
