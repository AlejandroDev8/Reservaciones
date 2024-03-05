<?php

namespace App\Notifications;

use App\Models\Reservacion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailMateriales extends Notification
{
    use Queueable;

    protected $solicitud;

    /**
     * Create a new notification instance.
     */
    public function __construct(Reservacion $solicitud)
    {
        $this->solicitud = $solicitud;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Solicitud de reservación de sala')
            ->line('¡Hola departamento de materiales!')
            ->line('Detalles de la solicitud:')
            ->line('ID de la solicitud: ' . $this->solicitud->id)
            ->line('Sala solicitada: ' . ($this->solicitud->sala ? $this->solicitud->sala->salas : 'Sin sala asociada'))
            ->line('Detalles extras: ' . $this->solicitud->extras)
            ->line('Fecha de Reservación: ' . $this->solicitud->fecha->format('d/m/Y'))
            ->line('Estado de la solicitud: Aceptada');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
