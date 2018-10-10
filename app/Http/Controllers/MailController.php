<?php

namespace App\Http\Controllers;

use Auth;
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
                    ->get(['users.name','users.email','challenges.cname','submissions.challenge_id','submissions.user_id']); 
            $submitted_user=User::find($user[0]->user_id);
            //dd($submitted_user->name);    
            Mail::send('template/submitChallengeMail',
            ['user'=>$user,'submit'=>$submit,"submitted_user"=>$submitted_user->name],
             function ($message)
              use($user, $submit) {
                $message->to( $user[0]->email,$user[0]->name)->subject('Submission of Challenge: ' . $user[0]->cname);
                $message->from(env('MAIL_FROM_ADDRESS'), 'cRank');
            });
        return true;
        
    }
}
