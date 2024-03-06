<?php

namespace App\Livewire;

use App\Models\Acomodo;
use App\Models\Sala;
use Livewire\Component;

class Respuesta extends Component
{
    public function render()
    {
        $salas = Sala::all();
        $acomodos = Acomodo::all();
        return view('livewire.respuesta', [
            'salas' => $salas,
            'acomodos' => $acomodos
        ]);
    }
}
