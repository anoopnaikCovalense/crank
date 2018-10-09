<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class challengeCreated extends Mailable 
{
    use Queueable, SerializesModels;
    
    public $user;
    public $challenge;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $challenge)
    {
        $this->user         = $user;
        $this->challenge    = $challenge;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Challenge: ' . $this->challenge->cname)->view('email.challenges.new');
    }
}
