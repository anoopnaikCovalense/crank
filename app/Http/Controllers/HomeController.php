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
        $challenges = DB::select('SELECT 
                                        challenges.tags,
                                        challenges.desc,
                                        challenges.created_at,
                                        challenges.id,
                                        COUNT(submissions.id) AS counts,
                                        challenges.cname,
                                        U.name AS createdByName
                                    FROM
                                        challenges
                                            LEFT JOIN
                                        submissions ON challenge_id = challenges.id
                                            LEFT JOIN
                                        users U ON U.id = challenges.user_id
                                    WHERE
                                        challenges.active = 1
                                    GROUP BY challenges.tags , challenges.id , challenges.desc , challenges.cname , U.name , challenges.created_at
                                    ORDER BY challenges.id DESC;');
        $user=user::find(Auth::user()->id);
        foreach($challenges as $challenge)
         {
            $parsed=Carbon::parse($challenge->created_at)->diffForHumans();
            $challenge->parsedTime=$parsed;

         }
        return view('home',['challs'=>$challenges,'user'=>$user]);
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
