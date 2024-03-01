<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\Acomodo;
use App\Models\User;
use Livewire\Component;

class SolicitarSala extends Component
{
    public $email;
    public $sala;
    public $fecha;
    public $sillas;
    public $extras;

    protected $rules = [
        'email' => 'required|email',
        'sala' => 'required',
        'fecha' => 'required',
        'sillas' => 'required',
        'extras' => 'required|max:100',
    ];

    public function mount()
    {
        $this->email = auth()->user()->email;
        $this->sala = '';
        $this->sillas = '';
    }

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
