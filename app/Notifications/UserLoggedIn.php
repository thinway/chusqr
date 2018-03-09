<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UserLoggedIn extends Notification
{
    use Queueable;

    private $userLoggedIn;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $userLoggedIn)
    {
        $this->userLoggedIn = $userLoggedIn;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
            ->subject("Nuevo login en Chusqer")
            ->greeting("Un usuario ha accedido a la aplicación")
            ->line("{$this->userLoggedIn->name} se acaba loguear.")
            ->action('Notification Action', url('/'.$this->userLoggedIn->slug))
            ->line('Vigila que no suba porno. Todos los hacen')
            ->salutation('Powered by Chusqer');
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
            'userLoggedIn' => $this->userLoggedIn
        ];
    }
}
