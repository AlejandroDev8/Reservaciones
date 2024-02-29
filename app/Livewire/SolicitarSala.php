<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\Acomodo;
use Livewire\Component;

class SolicitarSala extends Component
{
    public function render()
    {
        // Consultar la base de datos

        $salas = Sala::all();
        $acomodos = Acomodo::all();

        return view('livewire.solicitar-sala', [
            'salas' => $salas,
            'acomodos' => $acomodos,
        ]);
    }
}
