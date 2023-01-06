<?php

namespace App\Notifications;

use App\Models\Empleo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmpleoNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Empleo $empleo)
    {
        $this->empleo = $empleo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'empleo_id' => $this->empleo->id,
            'name' => $this->empleo->name,
            'user_id' => $this->empleo->user_id,
            'descripcion' => $this->empleo->descripcion,
            'category_id' => $this->empleo->category_id,
            'status' => $this->empleo->status,
            'modos' => $this->empleo->modos->pluck('id')->toArray(),
        ];
    }
}
