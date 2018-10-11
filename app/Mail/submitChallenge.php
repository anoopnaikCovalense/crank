<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;

class submitChallenge extends Mailable
{
    use Queueable;

    public $user;
    public $submit;
    public $loggedInUserName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $submit, $loggedInUserName)
    {
        $this->user      = $user;
        $this->submit    = $submit;
        $this->loggedInUserName = $loggedInUserName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  
        return $this->subject('Submission of Challenge: ' .$this->user->cname)->view('email.challenges.submit');
    }
}
