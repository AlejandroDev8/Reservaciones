<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\User;
use App\Models\Acomodo;
use Livewire\Component;

class FiltrarSolicitudes extends Component
{

    public $sala;
    public $acomodo;
    public $user;

    public function filtrarSolicitudes()
    {
        dd('buscando...');
    }

    public function render()
    {
        $salas = Sala::all();
        $acomodos = Acomodo::all();
        $users = User::all();

        return view('livewire.filtrar-solicitudes', [
            'salas' => $salas,
            'acomodos' => $acomodos,
            'users' => $users
        ]);
    }
}
