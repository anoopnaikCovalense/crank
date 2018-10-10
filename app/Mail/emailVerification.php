<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class emailVerification extends Mailable
{
    use Queueable;

    protected $user;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('cRank - verify your email address')->view('email.verifyEmail')->with([
            'emailToken' => $this->user->emailToken    
        ]);
    }
}
