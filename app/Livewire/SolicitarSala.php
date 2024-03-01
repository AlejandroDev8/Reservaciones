<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\Acomodo;
use App\Models\Reservacion;
use App\Models\User;
use Livewire\Component;

class SolicitarSala extends Component
{
    public $email;
    public $sala;
    public $fecha;
    public $acomodo;
    public $extras;

    protected $rules = [
        'email' => 'required|email',
        'sala' => 'required|numeric|between:1,3',
        'fecha' => 'required|unique:reservacions',
        'acomodo' => 'required|numeric|between:1,3',
        'extras' => 'required|max:100',
    ];

    public function mount()
    {
        $this->email = auth()->user()->email;
        $this->sala = '';
        $this->acomodo = '';
    }

    public function solicitarSala()
    {
        $datos = $this->validate();

        // Crear la solicitud

        Reservacion::create([
            'email' => $datos['email'],
            'sala_id' => $datos['sala'],
            'fecha' => $datos['fecha'],
            'acomodo_id' => $datos['acomodo'],
            'extras' => $datos['extras'],
            'user_id' => auth()->user()->id,
        ]);

        // Crear un mensaje flash

        session()->flash('message', 'La solicitud se ha registrado correctamente');

        // Redireccionar a la página de inicio

        return redirect()->route('reservaciones.index');
    }

    public function render()
    {

        $minDate = date('2024-01-01');
        $maxDate = date('2024-12-31');

        // Obetener al usuario autenticado
        $user = auth()->user();

        // Consultar la base de datos

        $salas = Sala::all();
        $acomodos = Acomodo::all();

        return view('livewire.solicitar-sala', [
            'salas' => $salas,
            'acomodos' => $acomodos,
            'userEmail' => $user->email,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
        ]);
    }
}
