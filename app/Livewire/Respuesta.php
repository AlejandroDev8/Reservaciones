<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\Acomodo;
use Livewire\Component;
use App\Models\Reservacion;
use Illuminate\Support\Carbon;

class Respuesta extends Component
{
    public $reservacion_id;
    public $email;
    public $sala;
    public $fecha;
    public $acomodo;
    public $extras;

    public function mount(Reservacion $reservacion)
    {
        $this->reservacion_id = $reservacion->id;
        $this->email = $reservacion->email;
        $this->sala = $reservacion->sala_id;
        $this->fecha = Carbon::parse($reservacion->fecha)->format('Y-m-d');
        $this->acomodo = $reservacion->acomodo_id;
        $this->extras = $reservacion->extras;
    }

    public function render(Reservacion $reservacion)
    {
        $salas = Sala::all();
        $acomodos = Acomodo::all();

        return view('livewire.respuesta', [
            'salas' => $salas,
            'acomodos' => $acomodos,
        ]);
    }
}
