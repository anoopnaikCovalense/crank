<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Challenge;
class UserController extends Controller
{
  
    public function index()
    {
    
     // one-one
        //    $challenge = User::find(1)->challenge;
        //    dd($challenge);

       
          //one-one inverse
            // $user = Challenge::find(1)->user;
            // dd($user);
    
            //many to many
            // $submissions = User::find(1)->submission;
            // dd($submissions);die;
          
          //  $challenge=DB::table('challenges')
          //  ->join('submissions','submissions.challenge_id','=','challenges.id')
          //  ->leftjoin('users','users.id','=','submissions.user_id')->get();
          
         // select * from challenges where id not in(
           //select challenge_id from submissions where submissions.user_id=1);
      //     $challenge = DB::table('challenges')->whereNotIn('id', function($q){
      //       $q->select('challenge_id')->from('submissions')->where('user_id',1);
      //   })->get();
      //  dd($challenge);
    //   $challenge = User::all();
    //     dd($challenge);
  
    }
}
