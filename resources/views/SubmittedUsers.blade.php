@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div style="overflow-x:hidden">
  <div>
    <div class="row">
      <div class="col-md-4">
        <div class="card" style="height:91.7vh">
            <div class="card-header bg-indigo text-white float-left">
                Challenge
            </div>
            <div class="card-body" style="overflow-y:auto">
        <b>Name:</b><br>
        {{$challenge->cname}}
        <br><br>
        <b>Description:</b><br>
        {{$challenge->desc}}
        <br><br>
        <b>Problem Statement:</b><br>
        {{$challenge->statement}}
        <br><br>
        <b>Input format:</b><br>
          {{$challenge->ipformat}}
        <br><br>
        <b>Contraints:</b><br>
        {{$challenge->constraints}}
        <br><br>
        <b>Output Format:</b><br>
        {{$challenge->opformat}}
        <br><br>
        <b>Tags:</b><br>
      {{$challenge->tags}}
      <br>
        <br>
      </b>
   
            </div>
 
        </div>
      </div>
     
      <div class="col-md-8" style="height:91.7vh;">
       
        <div class="card"  style="height:91.7vh">
            <div class="card-header bg-indigo  text-white float-left">
              Submissions
            </div>
            
            <div class="card-body" style="overflow-y:auto">
            <div class="list-group">

                  @foreach($submission as $submission)

                     <a href="{{route('accept_reject',['submissionid'=>$submission->id,'challengeid'=>$challenge->id])}}" class="list-group-item list-group-item-action flex-column align-items-start custom-list">
                         <div class="w-100" style="display:block;">
                     <h5 class="mb-1 float-left"><b>Submitted By:</b> {{ $submission->name }} <small>({{$submission->email}})</small></h5>
                     
                     <small class="float-right" style="font-size: 140%;vertical-align: middle; display:inline-block;">
                      @if ($submission->status === 'Approved')
                      <i class="fas fa-check" style="color:green;"></i>
                      @elseif ($submission->status === 'Rejected')
                      <i class="fas fa-times" style="color:salmon;"></i>
                      @else
                      <i class="fas fa-exclamation" style="color:orange;"></i> 
                      @endif
                      </small>
                     
                     @if ($submission->status === 'Approved' && isset($submission->rating) && $submission->rating > 0)
                     <span class="rating-numeric mr-3 float-right
                           @if ($submission->rating >= 7)
                            text-success
                           @elseif ($submission->rating >= 4)
                            text-warning
                           @else
                            text-danger
                           @endif
                           " style="display:inline-block;">{{ $submission->rating }} / 10</span>
                     @endif
                     
                     
                    </div>

                       </a>

                  @endforeach
                  </div>

           
            </div>
        </div>
    

        </div> 
      </div>
    </div>
  </div>
</div>


@endsection