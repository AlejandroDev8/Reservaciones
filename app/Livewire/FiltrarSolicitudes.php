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
    public $user;
    public $estado;

    public function filtrarSolicitudes()
    {
        // Verificar si los campos están seleccionados
        if ($this->sala == "--Seleccione--") {
            $this->sala = null;
        }
        if ($this->user == "--Seleccione--") {
            $this->user = null;
        }
        if ($this->estado == "-- Seleccione --") {
            $this->estado = null;
        }

        $this->dispatch('terminosBusqueda', $this->sala, $this->user, $this->estado);
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
