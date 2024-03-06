<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservacion;
use App\Notifications\Solicitud;
use App\Notifications\EmailMateriales;
use App\Notifications\SolicitudRechazada;
use Illuminate\Support\Facades\Notification;

class MostrarSolicitudesAdmin extends Component
{
    public $solicitudId;

    public function aceptarSolicitud($id)
    {
        $solicitud = Reservacion::find($id);
        $solicitud->estado_id = 2;
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

    public function render()
    {
        $solicitudes = Reservacion::paginate(10);

        return view('livewire.mostrar-solicitudes-admin', [
            'solicitudes' => $solicitudes
        ]);
    }
}
