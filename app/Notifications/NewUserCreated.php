<?php

namespace App\Notifications;
use App\Admin;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserCreated extends Notification
{
    use Queueable;

    private $registered;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $registered)
    {
        $this->registered= $registered;
        $this->registeredUser=$registered->user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [

            'message'=>'New user is Registerd',
        ];
    }
}
