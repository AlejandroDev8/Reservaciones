<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservacion;
use App\Notifications\Solicitud;
use App\Notifications\EmailMateriales;
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
        return redirect()->back();
    }

    public function rechazarSolicitud($id)
    {
        $solicitud = Reservacion::find($id);
        $solicitud->estado_id = 3;
        $solicitud->save();
    }

    public function regresarSolicitud($id)
    {
        $solicitud = Reservacion::find($id);
        $solicitud->estado_id = 1;
        $solicitud->save();
    }

    public function render()
    {
        $solicitudes = Reservacion::paginate(10);

        return view('livewire.mostrar-solicitudes-admin', [
            'solicitudes' => $solicitudes
        ]);
    }
}
