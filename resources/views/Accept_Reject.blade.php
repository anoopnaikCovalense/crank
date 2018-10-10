@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<style type="text/css" media="screen">
    body {
        overflow: hidden;
    }
</style>
<div>
  <div>    
    <div class="row">
      <div class="col-md-3">
        <div class="card" style="height:92vh;">
          <div class="card-header bg-indigo  text-white float-left" style="height:10vh">
             Problem
          </div>
          <div class="card-body" style="overflow-y:auto">
            <b>Name:</b><br>
            {{$challenge->cname}}
            <br> <br>
            <b>Description:</b><br>
            {{$challenge->desc}}
            <br> <br>
            <b>Problem Statement:</b><br>
            {{$challenge->statement}}
            <br> <br>
            <b>Input format:</b><br>
              {{$challenge->ipformat}}
            <br> <br>
            <b>Constraints:</b><br>
            {{$challenge->constraints}}
            <br> <br>
            <b>Output Format:</b><br>
            {{$challenge->opformat}}
            <br> <br>
            <b>Tags:</b><br>
          {{$challenge->tags}}
          <br>
            <br>
          </b>
         </div>
        </div>
    </div>
     <div class="col-md-6" style="padding:0%">
        <div class="card" style="height:92vh;width:100%">
         <div class="card-header bg-indigo  text-white float-left" style="height:10vh">
          <span>Code</span>
         </div>
          <div class="card-body">
            <h3>{{$submission->code}}</h3>
          </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card"  style="height:92vh">
            <div class="card-header bg-indigo text-white " style="height:10vh">
                Output
            </div>
            <div class="card-body" style="overflow-y:auto;">
              <p>
                {{$submission->output}}
              </p>
            </div> 
            <div class="card-footer bg-indigo text-right">
                <a href="{{route('setstatus',['submissionid'=>$submission->id,'status'=>'Approved'])}}"><button   class="btn btn-success"><i class="fa fa-thumbs-up"> Approve</i></button></a>
                <a  href="{{route('setstatus',['submissionid'=>$submission->id,'status'=>'Rejected'])}}"><button   class="btn btn-danger"><i class="fa fa-thumbs-down"> Reject</i></button></a>
            </div>     
        </div>      
      </div>
    </div>
</div>
@endsection