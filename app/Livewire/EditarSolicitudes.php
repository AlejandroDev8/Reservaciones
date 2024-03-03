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

    public function mount(Reservacion $reservacion)
    {
        $this->reservacion_id = $reservacion->id;
        $this->email = $reservacion->email;
        $this->sala = $reservacion->sala_id;
        $this->fecha = Carbon::parse($reservacion->fecha)->format('Y-m-d');
        $this->acomodo = $reservacion->acomodo_id;
        $this->extras = $reservacion->extras;
    }

    public function editarSolicitud()
    {
        $datos = $this->validate();

        // Encontrar la solicitud a editar

        $reservacion = Reservacion::find($this->reservacion_id);

        // Si la fecha no ha cambiado, no es necesario validar

        if ($reservacion->fecha === $datos['fecha']) {
            $this->validate();
        }

        // Si la fecha es diferente, verificar que no exista otra solicitud con la misma fecha

        if ($reservacion->fecha != $datos['fecha']) {
            $this->validate([
                'fecha' => 'unique:reservacions',
            ]);
        }

        // Asignar los nuevos valores

        $reservacion->email = $datos['email'];
        $reservacion->sala_id = $datos['sala'];
        $reservacion->fecha = $datos['fecha'];
        $reservacion->acomodo_id = $datos['acomodo'];
        $reservacion->extras = $datos['extras'];

        // Guardar los cambios

        $reservacion->save();

        // Crear un mensaje flash

        session()->flash('message', 'La solicitud se ha actualizado correctamente');

        // Redireccionar a la página de inicio

        return redirect()->route('reservaciones.index');
    }

    public function render()
    {
        $minDate = date('2024-01-01');
        $maxDate = date('2024-12-31');

        // Consultar la base de datos

        $salas = Sala::all();
        $acomodos = Acomodo::all();

        return view('livewire.editar-solicitudes', [
            'salas' => $salas,
            'acomodos' => $acomodos,
            'minDate' => $minDate,
            'maxDate' => $maxDate,
        ]);
    }
}
