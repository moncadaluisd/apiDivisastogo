<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class MessageRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($data)
     {
         $this->data = $data;
     }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                ->subject('Nueva Notificacion')
                ->markdown('email.notification', [
                    'url' => $this->data['url'],
                    'username' => $this->data['username'], 
                    'description' => $this->data['description'],
                    'title' => $this->data['title'] ,
                    'button' => $this->data['button'],
                    ]);
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
          'url'  => $this->data['url'],
          'title' => $this->data['title'],
          'description'   =>  $this->data['description'],
          'username' => $this->data['username'],
          'button' => $this->data['button'],
          'time'  =>  Carbon::now()->diffForHumans(),
      ];
    }
}
