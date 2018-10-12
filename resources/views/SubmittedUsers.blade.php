@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div style="overflow-x:hidden">
  <div>    
    <div class="row">
      <div class="col-md-4">
        <div class="card"  style="height:91.7vh">
            <div class="card-header bg-indigo  text-white float-left">
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
       
        <div class="card"  style="height:91.7vh" >
            <div class="card-header bg-indigo  text-white float-left">
              Submissions
            </div>
            
            <div class="card-body" style="overflow-y:auto">
            <div class="list-group">

                  @foreach($submission as $submission)

                     <a href="{{route('accept_reject',['submissionid'=>$submission->id,'challengeid'=>$challenge->id])}}" class="list-group-item list-group-item-action flex-column align-items-start custom-list">
                     <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1"><b>Submitted By :</b> {{$submission->name}}</h5>
                     @if ($submission->status === 'Approved')
                     <div>
                          <b>{{$submission->rating}} <span style="color:orange"><i class="fa fa-star"></i></span></b>
                     </div>
                     @endif
                     <small style="font-size: 140%;vertical-align: middle;">
                      @if ($submission->status === 'Approved')
                      <i class="fas fa-check" style="
                        color:green;
                        "></i>
                      @elseif ($submission->status === 'Rejected')
                      <i class="fas fa-times"  style="
                        color:red;
                        "></i>@else
                      <i class="fas fa-exclamation" style="
                        color:darksalmon;
                        "></i> 
                      @endif
                      </small>
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