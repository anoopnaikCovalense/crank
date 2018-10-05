<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Submission; 
use App\User;
use App\Challenge;
use Carbon\Carbon;
class SubmissionController extends Controller
{
   //store Submission
    public function store(Request $request)  
    {     
       $submit = new Submission;
       $submit->code =$_POST['code'];
       $submit->language =$_POST['language'];
       $submit->cstatus = $_POST['cstatus'];
       $submit->rstatus= $_POST['rstatus'];
       $submit->challenge_id=$_POST['cid'];
       $submit->user_id=$_POST['uid'];
       $submit->output=$_POST['output'];
       $submit->save();
       return redirect()->route('submissions');

   
    
  }
    //Challenges Submitted by the User
    public function challenges_submitted()
     {
  
    $challenges =Challenge::
            join('submissions','challenges.id', '=', 'submissions.challenge_id')
            ->where('submissions.user_id','=',Auth::user()->id)
            ->join('users','submissions.user_id','=','users.id')
            ->get(['submissions.created_at','challenges.cname','challenges.desc','users.name','submissions.status','submissions.challenge_id','submissions.id']);
            foreach($challenges as $challenge)
         {
            $parsed=Carbon::parse($challenge->created_at)->diffForHumans();
            $challenge->parsedTime=$parsed;

         }   
    
       return view('submission',['challenges'=>$challenges]);
    }
    //Submitted Details
    public function submission_details(){
        $submission=Submission::where('challenge_id','=',$_REQUEST['cid'])
        ->where('user_id','=',Auth::user()->id)
        ->where('submissions.id','=',$_REQUEST['sid'])->get();
        $prob=Challenge::find($_REQUEST['cid']);
        
        return view('submissionpage',['sub'=>$submission,'challenge'=>$prob]);
    }
    //submitted users details
    public function submitted_users()
    {  
        $challenge=Challenge::find($_REQUEST['cid']);
        $submissions=Submission::where('challenge_id','=',$_REQUEST['cid'])
        ->join('users','users.id','=','submissions.user_id')
        ->get(['users.name','submissions.id','submissions.status']);      
                                                                                                                                     
        
        return view('SubmittedUsers',['challenge'=>$challenge,'submission'=>$submissions]);
    }
    //accept or reject
    public function Accept_Reject()
    {   $submission=Submission::find($_REQUEST['submissionid']);
        $challenge=Challenge::find($_REQUEST['challengeid']);
        
        return view('Accept_Reject',['submission'=>$submission,'challenge'=>$challenge]);
    }
    //set status Accept or Reject
    public function set_status()
    {
        $submission=Submission::find($_REQUEST['submissionid']);
        $submission->status=$_REQUEST['status'];
        $submission->save();
        return redirect()->route('submittedusers',['submission'=>$submission,'cid'=>$submission->challenge_id]);
    }
   
}
