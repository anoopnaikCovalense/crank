<?php

namespace App\Http\Controllers;
use App\mcq;
use App\mcq_submission;
use App\mcq_answer;
use App\mcq_question;
use App\mcq_option;
use Auth;
use DB;
use Illuminate\Http\Request;

class mcqcontroller extends Controller
{
    public function ans_store(Request $request)
    {   
       $answers_array=json_decode($_REQUEST['answer'],true);    
       foreach ( $answers_array as $ans=> $ansValues)
         {
            $mcq=mcq_question::where('id',$ansValues['question_id'])->take(1)->get(['mcq_id']);
            $mcq_submission=new mcq_submission();
            $mcq_submission->mcq_id=1;
            $mcq_submission->user_id=123;
            $mcq_submission->save();
             foreach ($ansValues as $an=>$anv)
             {
                 if (!isset($anv['option_id'])) continue;
                $mcq_answer=new mcq_answer();
                // echo $an." => " . (isset($anv['option_id']) ? $anv['option_id'] : $anv) . PHP_EOL;
                $mcq_answer->mcq_question_id=$ansValues['question_id'];
                $mcq_answer->option=$anv['option_id'];
                $mcq_answer->mcq_submission_id=$mcq_submission->id;
                $mcq_answer->save();
             }           
         }
    }
    public function store(Request $request)
    {
        $mcq= new mcq();
        $mcq->title = $request->get('title');
        $mcq->desc = $request->get('desc');
        $mcq->user_id = Auth::user()->id;
        $mcq->save();

//  dd($request->get('challenge'));
//  exit;
        
        if (!empty($request->get('challenge')))
        {
            foreach ($request->get('challenge')['questions'] as $questionNo => $questionValues)
            {
                $mcq_question= new mcq_question();
                $mcq_question->question =$questionValues['title'];
                $mcq_question->mcq_id=$mcq->id;
                // $mcq_question->user_id = Auth::user()->id; // @todo remove this field from db and model
                $mcq_question->save();
                  
                foreach ($questionValues['options'] as $optionNo => $optionValues)
                {
                    $mcq_option= new mcq_option();
                    $mcq_option->option=$optionValues;
                    $mcq_option->isAnswer=(isset($questionValues['answers']) && array_key_exists($optionNo, $questionValues['answers'])) ? 1 : 0;
                    $mcq_option->mcq_question_id=$mcq_question->id;
                    $mcq_option->save();
                }

            }
        }
        return redirect()->route('home');
}
 public function solvemcqs(Request $request)
 {
    // $mcqques=mcq_question::find($_REQUEST['mcqid'])
    $mcqs=mcq::where('mcq_id',$_REQUEST['mcqid'])
    ->leftjoin('mcq_questions','mcqs.id','=','mcq_questions.mcq_id')
    ->get(['mcqs.title','mcq_questions.question','mcq_questions.id']);
    //  return  $mcqs;

    $quiz = [];
    $i=0;$j=0;
    foreach ($mcqs as $m)
    {  
       $quiz[$i]['q'] = $m->question;
       $quiz[$i]['id'] = $m->id;
       $rightoption=mcq_option::where('mcq_question_id',$m->id)->where('isAnswer',1)->pluck('option');
       $quiz[$i]['a']=$rightoption;
       $options=mcq_option::where('mcq_question_id',$m->id)->get(['option','id']);
       $j=0;
       foreach($options as $option)
         { 
            //  $quiz[$i]['options'][$j++]=$option;
            $quiz[$i]['options'][$option->id]=$option->option;
         }
         $i++;
    }
    // $quiz[0]['q'] =
    // $quiz[0]['a'][] =
    // $quiz[0]['options'][] =
    //  return $quiz;
 return view('solve',['questions'=>json_encode($quiz)]);
 }
}
