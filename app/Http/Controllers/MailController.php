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
        // $renderedData = view('sendtoAll')->render();
        // Mail::send(['text'=>'mail'],['name','Ankit'],function($message){

        // $message->to('ankitguptag34@gmail.com','To Rahul')->subject('Test Email');
        // $message->from('ankitguptag34@gmail.com','Ankit');
        // $message ->attachData($renderedData, 'name_of_attachment');

      
        $data = array( User::where('id','!=',Auth::user()->id)->get(['email','name']) );
        Mail::send('template/sendtoAll',$data, function($message)
{
    $message->to('ankitguptag34@gmail.com', 'John Smith')->subject('Welcome!');
    $message->from('ankitguptag34@gmail.com','Ankit');

});
  
    
}
}
