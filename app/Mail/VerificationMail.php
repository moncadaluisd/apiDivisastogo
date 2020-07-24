<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $message = '';
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $message, $url= '')
    {
        //
        $this->user = $user;
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $this->from('info@divisastogo.com')
                  ->markdown('email.verification');
    }
}
