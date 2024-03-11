<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\Acomodo;
use App\Models\Reservacion;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EditarSolicitudes extends Component
{
    public $reservacion_id;
    public $email;
    public $sala;
    public $fecha_inicio;
    public $fecha_fin;
    public $acomodo;
    public $extras;

    protected $rules = [
        'email' => 'required|email',
        'sala' => 'required|numeric|between:1,3',
        'acomodo' => 'required|numeric|between:1,3',
        'extras' => 'max:100',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
    ];

    public function mount(Reservacion $reservacion)
    {
        $this->reservacion_id = $reservacion->id;
        $this->email = $reservacion->email;
        $this->sala = $reservacion->sala_id;
        $this->fecha_inicio = Carbon::parse($reservacion->fecha)->format('Y-m-d');
        $this->fecha_fin = Carbon::parse($reservacion->fecha)->format('Y-m-d');
        $this->acomodo = $reservacion->acomodo_id;
        $this->extras = $reservacion->extras;
    }

    public function editarSolicitud()
    {
        $datos = $this->validate();

        // Encontrar la solicitud a editar

        $reservacion = Reservacion::find($this->reservacion_id);

        // Variable para  rastrear si los campos han sido editados

        $cambios = false;

        // Comprobar si los campos han sido editados y asignar los nuevos valores
        if ($reservacion->email !== $datos['email']) {
            $reservacion->email = $datos['email'];
            $cambios = true;
        }
        if ($reservacion->sala_id !== $datos['sala']) {
            $reservacion->sala_id = $datos['sala'];
            $cambios = true;
        }
        // Comprobar si los campos han sido editados y asignar los nuevos valores
        if ($reservacion->fecha_inicio !== $datos['fecha_inicio']) {
            $reservacion->fecha_inicio = $datos['fecha_inicio'];
            $cambios = true;
        }
        if ($reservacion->fecha_fin !== $datos['fecha_fin']) {
            $reservacion->fecha_fin = $datos['fecha_fin'];
            $cambios = true;
        }

        if ($reservacion->acomodo_id !== $datos['acomodo']) {
            $reservacion->acomodo_id = $datos['acomodo'];
            $cambios = true;
        }
        if ($reservacion->extras !== $datos['extras']) {
            $reservacion->extras = $datos['extras'];
            $cambios = true;
        }

        // Guardar los cambios solo si hay cambios
        if ($cambios) {
            $reservacion->save();
            session()->flash('message', 'La solicitud se ha actualizado correctamente');
        } else {
            session()->flash('message', 'No se realizaron cambios en la solicitud');
        }
        // Redireccionar a la página de inicio

        return redirect()->route('reservaciones.index');
    }

    public function render()
    {
        $minDate = date('2024-01-01');
        $maxDate = date('2024-12-31');

        // Consultar la base de datos
        $solicitudes = Reservacion::all();
        $salas = Sala::all();
        $acomodos = Acomodo::all();

        return view('livewire.editar-solicitudes', [
            'solicitudes' => $solicitudes,
            'salas' => $salas,
            'acomodos' => $acomodos,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
        ]);
    }
}
