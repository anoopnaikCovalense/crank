<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class challengeCreated extends Mailable 
{
    /**
     * removing SerializesModels trait as user/challenge are not actual models
     * https://stackoverflow.com/questions/32984802/laravel-5-1-no-query-results-for-model-in-queue
     */
    use Queueable;
    
    public $user;
    public $challenge;
    public $loggedInUserName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $challenge, $loggedInUserName)
    {
        $this->user         = $user;
        $this->challenge    = $challenge;
        $this->loggedInUserName = $loggedInUserName;
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
