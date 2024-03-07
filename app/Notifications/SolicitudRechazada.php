<?php

namespace App\Notifications;

use App\Models\Reservacion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SolicitudRechazada extends Notification
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
            ->line('¡Hola ' . $notifiable->name . '!')
            ->line('Tu solicitud para reservar una sala ha sido rechazada.')
            ->line('Motivos de rechazo: ' . $this->solicitud->respuesta);
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
