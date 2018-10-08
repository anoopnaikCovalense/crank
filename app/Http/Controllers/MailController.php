<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Mail;
use App\User;

class MailController extends Controller
{

    public static function createNewChallenge($challenge)
    {
        $users = array(User::where('id', '!=', Auth::user()->id)->get(['email', 'name']));
        
        foreach ($users as $user)
        {
            
            Mail::send('template/createNewChallengeMail',['user'=>$user,'challenge'=>$challenge],
             function ($message)
              use($user, $challenge) {
                $message->to('karthikeyan.prabhakaran@covalense.com', $user[0]->name)->subject('New Challenge: ' . $challenge->cname);
                $message->from(env('FROM_EMAIL'), 'cRank');
            });

        }

        return true;
        
    }
}
