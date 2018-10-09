<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Mail\challengeCreated;

class MailController extends Controller
{

    public static function createNewChallenge($challenge)
    {
        $users = User::where('id', '!=', Auth::user()->id)->get(['email', 'name']);
        
        foreach ($users as $user)
        {
            Mail::to($user->email)->send(new challengeCreated($user, $challenge));
        }

        return true;
        
    }
}
