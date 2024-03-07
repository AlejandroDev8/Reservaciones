<?php

namespace App\Livewire;

use App\Models\Sala;
use Livewire\Component;
use App\Models\Reservacion;
use Livewire\Attributes\On;

class MostrarSolicitudes extends Component
{
    public function getFechaInicioFormattedAttribute()
    {
        return $this->fecha_inicio ? \Carbon\Carbon::parse($this->fecha_inicio)->format('d/m/Y') : null;
    }


    protected $listeners = ['eliminarSolicitud'];

    public function eliminarSolicitud(Reservacion $reservacion)
    {
        $reservacion->delete();
    }

    public function render()
    {
        $solicitudes = Reservacion::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-solicitudes', [
            'solicitudes' => $solicitudes,
        ]);
    }
}
