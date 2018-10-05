<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Mail;
use App\User;

class MailController extends Controller
{

    public function send()
    {


        $data = array(User::where('id', '!=', Auth::user()->id)->get(['email', 'name']));
        Mail::send('template/sendtoAll', $data, function ($message) {
            $message->to('ankitguptag34@gmail.com', 'John Smith')->subject('Welcome!');
            $message->from('ankitguptag34@gmail.com', 'Ankit');

        });


    }
}
