<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\User;
use App\Mail\challengeCreated;
use App\Mail\submitChallenge;

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
    
    public static function SubmitChallenge($submit)
    {      
           $user=User::
                    join('challenges','users.id','=','challenges.user_id')
                    ->join('submissions','challenges.id','=','submissions.challenge_id')
                    ->where('submissions.id','=',$submit->id)
                    ->select(['users.name','users.email','challenges.cname','submissions.challenge_id','submissions.user_id'])->first();
                    $submitted_user=User::find($user->user_id);
            Mail::to($user->email)->queue(new submitChallenge($user, $submit,$submitted_user->name));

        return true;
        
    }
}
