<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\User;
use App\Mail\challengeCreated;
use App\Mail\emailVerification;

class MailController extends Controller
{

    public static function createNewChallenge($challenge)
    {
        $users = User::where('id', '!=', Auth::user()->id)->get(['email', 'name']);
        
        foreach ($users as $user)
        {
            Mail::to($user->email)->queue(new challengeCreated($user, $challenge, Auth::user()->name));
        }

        return true;
    }
    
    public function send()
    {
        $user = User::where('email', '=', 'anoct92018@yopmail.com')->first();
        Mail::to($user->email)->send(new emailVerification($user));
    }
}
