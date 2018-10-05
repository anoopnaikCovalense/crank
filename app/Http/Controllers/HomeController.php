<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Challenge;
use App\Submission;
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     **/
    public function __construct()
    {
       $this->middleware('auth');
    }

    /*
      Show the application dashboard.

      @return \Illuminate\Http\Response
     */

    public function index()
    {
        $challenges = DB::select('select challenges.tags,challenges.desc,challenges.created_at,challenges.id,count(submissions.id) as counts ,challenges.cname,U.name 
        from challenges left join submissions
        on challenge_id=challenges.id left join users U 
        on U.id = submissions.user_id 
        where challenges.active=1 group by  challenges.tags,challenges.id,challenges.desc,challenges.cname,U.name,challenges.created_at order by challenges.id DESC ');
        foreach($challenges as $challenge)
         {
            $parsed=Carbon::parse($challenge->created_at)->diffForHumans();
            $challenge->parsedTime=$parsed;

         }
        return view('home',['challs'=>$challenges]);
    }


    /**
     * New challenge page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function newchallenge()
    {
        return view('newchallengepage');
    }


    /**
     * Update page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function update()
    {
        return view ('Update');
    }

}
