<?php

namespace App\Livewire;

use App\Models\Sala;
use App\Models\Acomodo;
use Livewire\Component;
use App\Models\Reservacion;
use Illuminate\Support\Carbon;
use App\Notifications\Solicitud;
use App\Notifications\EmailMateriales;
use App\Notifications\SolicitudRechazada;
use Illuminate\Support\Facades\Notification;

class Respuesta extends Component
{
    public $reservacion_id;
    public $email;
    public $sala;
    public $fecha;
    public $acomodo;
    public $extras;
    public $respuesta;

    public function mount(Reservacion $reservacion)
    {
        $this->reservacion_id = $reservacion->id;
        $this->email = $reservacion->email;
        $this->sala = $reservacion->sala_id;
        $this->fecha = Carbon::parse($reservacion->fecha)->format('Y-m-d');
        $this->acomodo = $reservacion->acomodo_id;
        $this->extras = $reservacion->extras;
    }

    public function aceptarSolicitud($id)
    {
        $solicitud = Reservacion::find($id);
        $solicitud->estado_id = 2;
        $solicitud->respuesta = $this->respuesta;
        $solicitud->save();

        // Enviar notificación al usuario

        if ($solicitud->user) {
            $solicitud->user->notify(new Solicitud($solicitud));
        }

        Notification::route('mail', 'alejandrodeveloper417@gmail.com')
            ->notify(new EmailMateriales($solicitud));

        // crear un mensaje flash

        session()->flash('message', 'La solicitud se ha aceptado correctamente');

        // Redireccionar a la página de inicio

        return redirect()->route('reservaciones.index');
    }

    public function rechazarSolicitud($id)
    {
        $solicitud = Reservacion::find($id);
        $solicitud->estado_id = 3;
        $solicitud->respuesta = $this->respuesta;
        $solicitud->save();

        // Enviar notificación al usuario

        if ($solicitud->user) {
            $solicitud->user->notify(new SolicitudRechazada($solicitud));
        }

        // crear un mensaje flash

        session()->flash('message', 'La solicitud ha sido rechazada');

        // Redireccionar a la página de inicio

        return redirect()->route('reservaciones.index');
    }

    public function render(Reservacion $reservacion)
    {
        $salas = Sala::all();
        $acomodos = Acomodo::all();

        return view('livewire.respuesta', [
            'salas' => $salas,
            'acomodos' => $acomodos,
        ]);
    }
}
