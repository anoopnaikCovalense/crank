@extends('layouts.app')
@section('content')
<script type="text/javascript" src="{{ URL::asset('js/searchbar.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}"/>
<div class="container text-center" style="  padding-top:10px;"><div>
<div>
<a href="https://placeholder.com"><img src="https://via.placeholder.com/390x105"></a>
</div>
     <div class="row">
            <div class="col-md-6 text-left" style="padding-top:15px">
            </div>
           
            <div class="col-md-6 text-right">
                    <br>
                
                    <a href="{{route('submissions')}}" class="btn btn-indigo" style="line-height: 1;">My Submissions </a>     
                
                    <a href="{{route('mychallenges')}}" class="btn btn-indigo" style="line-height: 1;">My Challenges </a>
            </div>
    </div>
    &nbsp;
       <br>
       @if(isset($challs))
       @foreach ($challs as $ch)    
       <div class="list-group  custom-list">
            <a href="{{route('challenge',['cid'=>$ch->id])}}" class="list-group-item list-group-item-action flex-column align-items-start ">
                <div class="d-flex w-100 justify-content-between">           
                    <h5 class="mb-1"><i class="fa fa-trophy" aria-hidden="true" style="color:mediumseagreen"></i>&nbsp;
                        <b><span style="color:black">{{$ch->cname}}</span></b></h5>
                            <small>{{$ch->parsedTime}}</small>
                </div>
                <p class="mb-1"><span style="color:blue">{{$ch->desc}}</span></p>
                <small><b>Created by : </b>{{$ch->createdByName}}</small>
                @if($ch->tags!="")
                    <div class="text-left"><i class="fas fa-tags"style="color:black"></i>&nbsp;{{$ch->tags}}</div>
                @endif
                <div class="d-flex justify-content-end">
                <small ><i class="fas fa-users"style="color:black"></i>   &nbsp; {{$ch->counts}}</small>
                </div>
            </a>

        </div>
        @endforeach
        @else
        <strong> No Challenges to Solve!!</strong>
        @endif
        </div>
    </div>
    <br>
   </div>
  </div>
</div>

@endsection