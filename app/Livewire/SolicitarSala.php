<?php

namespace App\Livewire;

use App\Models\Sala;
use Livewire\Component;

class SolicitarSala extends Component
{
    public function render()
    {
        // Consultar la base de datos

        $salas = Sala::all();

        return view('livewire.solicitar-sala', [
            'salas' => $salas,
        ]);
    }
}
