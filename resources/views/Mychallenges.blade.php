@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<script src="{{ URL::asset('js/mychallenges.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container text-center" style="  padding-top:10px;">
      <div>
          <div class="row">
            <div class="col-md-6 text-center"></div>
                <div class="col-md-6 text-right">
                        <br>
                        <a href="{{route('newchallenge')}}" class="btn btn-indigo">Create New Challenge </a>
                </div>
            </div>
          &nbsp;
            <br>
            @if(isset($challenges))
            <div class="list-group">

                @foreach($challenges as $challenge)
                    <div class="list-group-item list-group-item-action flex-column align-items-start custom-list"
              data-link="{{route('submittedusers',['cid'=>$challenge->id])}}">
                    <div class="d-flex w-100 justify-content-between">
                    <h3 class="mb-1"><span style="color:black"><i class="fa fa-trophy" aria-hidden="true" style="color:mediumseagreen"></i>&nbsp;{{$challenge->cname}}</span></h3>
                    <small>{{$challenge->parsedTime}}</small>
            </div>
                <p class="mb-1"><span style="color:blue">{{$challenge->desc}}</p>
                <span class="pull-center">
                    <a href="{{route('prevdetails',['cid'=>$challenge->id])}}" class="btn  btn-indigo" role="button"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Update</a>
                    <button  onclick="delete_record(this)" id="{{$challenge->id}}" id="deleteChallenge" class="btn btn-indigo" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete</button>
                </span>
              <div class="d-flex justify-content-end">
              <small ><i class="fa fa-users"></i> &nbsp; {{$challenge->count}}</small>
              </div>

       </div>
              @endforeach
     </div>
              @else
              <b>No Challenges Yet!!</b>
              @endif

    </div>
</div>
@endsection
