<?php

namespace App\Livewire;

use App\Models\Sala;
use Livewire\Component;

class Respuesta extends Component
{
    public function render()
    {
        $salas = Sala::all();
        return view('livewire.respuesta', [
            'salas' => $salas
        ]);
    }
}
