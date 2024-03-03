<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\Acomodo;
use App\Models\Reservacion;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EditarSolicitudes extends Component
{
    public $sala;
    public $fecha;
    public $acomodo;
    public $extras;

    public function mount(Reservacion $reservacion)
    {
        $this->sala = $reservacion->sala_id;
        $this->fecha = Carbon::parse($reservacion->fecha)->format('Y-m-d');
        $this->acomodo = $reservacion->acomodo_id;
        $this->extras = $reservacion->extras;
    }

    public function render()
    {
        $minDate = date('2024-01-01');
        $maxDate = date('2024-12-31');

        // Obetener al usuario autenticado
        $user = auth()->user();

        // Consultar la base de datos

        $salas = Sala::all();
        $acomodos = Acomodo::all();

        return view('livewire.editar-solicitudes', [
            'salas' => $salas,
            'acomodos' => $acomodos,
            'userEmail' => $user->email,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
        ]);
    }
}
