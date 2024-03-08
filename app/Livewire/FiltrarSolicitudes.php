<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\User;
use App\Models\Acomodo;
use App\Models\Estados;
use Livewire\Component;

class FiltrarSolicitudes extends Component
{

    public $sala;
    public $acomodo;
    public $user;
    public $estado;

    public function filtrarSolicitudes()
    {
        dd('buscando...');
    }

    public function render()
    {
        $salas = Sala::all();
        $acomodos = Acomodo::all();
        $users = User::all();
        $estados = Estados::all();

        return view('livewire.filtrar-solicitudes', [
            'salas' => $salas,
            'acomodos' => $acomodos,
            'users' => $users,
            'estados' => $estados
        ]);
    }
}
