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
        $users = array(User::where('id', '!=', Auth::user()->id)->get(['email', 'name']));
        
        foreach ($users as $user)
        {
            echo $user[0]->email . PHP_EOL;
            Mail::to($user[0]->email)->send(new challengeCreated($user, $challenge));
        }

        return true;
        
    }
}
