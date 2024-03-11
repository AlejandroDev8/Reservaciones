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
    public $fecha_inicio;
    public $fecha_fin;
    public $acomodo;
    public $extras;

    public function mount()
    {
        $this->email = auth()->user()->email;
        $this->sala = '';
        $this->acomodo = '';
    }

    public function solicitarSala()
    {
        $this->validate([
            'email' => 'required|email',
            'sala' => 'required|numeric|between:1,3',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'acomodo' => 'required|numeric|between:1,3',
            'extras' => 'max:100',
        ]);

        // Verificar si las fechas están disponibles para la sala seleccionada
        $reservas = Reservacion::where('sala_id', $this->sala)
            ->where(function ($query) {
                $query->whereBetween('fecha_inicio', [$this->fecha_inicio, $this->fecha_fin])
                    ->orWhereBetween('fecha_fin', [$this->fecha_inicio, $this->fecha_fin])
                    ->orWhere(function ($query) {
                        $query->where('fecha_inicio', '<=', $this->fecha_inicio)
                            ->where('fecha_fin', '>=', $this->fecha_fin);
                    });
            })
            ->exists();

        if ($reservas) {
            $this->addError('fecha_inicio', 'Las fechas seleccionadas ya han sido reservadas para esta sala.');
            $this->addError('fecha_fin', 'Las fechas seleccionadas ya han sido reservadas para esta sala.');
            return;
        }

        // Crear la reserva
        Reservacion::create([
            'email' => $this->email,
            'sala_id' => $this->sala,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'acomodo_id' => $this->acomodo,
            'extras' => $this->extras,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'La solicitud se ha registrado correctamente');
        return redirect()->route('reservaciones.index');
    }


    public function render()
    {
        $minDate = date('Y-m-d');
        $maxDate = date('Y-m-d', strtotime('+1 year'));

        $user = auth()->user();
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
