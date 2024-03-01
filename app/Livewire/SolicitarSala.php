<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\Acomodo;
use App\Models\User;
use Livewire\Component;

class SolicitarSala extends Component
{
    public function render()
    {

        // Obetener al usuario autenticado
        $user = auth()->user();

        // Consultar la base de datos

        $salas = Sala::all();
        $acomodos = Acomodo::all();

        return view('livewire.solicitar-sala', [
            'salas' => $salas,
            'acomodos' => $acomodos,
            'userEmail' => $user->email,
        ]);
    }
}
