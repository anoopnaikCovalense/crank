@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}"/>
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<div class="container text-center" style="  padding-top:10px;">
    <div class="text-center" style="padding-top:10px">
        <div>
            <a href="http://www.covalense.com/"><img src="cvl-logo-blue.png" height="40"></a>
        </div>
    </div>
     <div class="row">
            <div class="col-md-6 text-left" >
            <!-- <form class="form-inline active-indigo-3 active-indigo-4">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search Here...." aria-label="Search">
            </form> -->
            </div>
            <div class="col-md-6 text-right">
                    <a href="{{route('submissions')}}" class="btn btn-indigo" style="line-height: 1;">My Submissions </a>
                    <a href="{{route('mychallenges')}}" class="btn btn-indigo " style="line-height: 1;">My Challenges </a>
                    <button type="button" class="btn btn-success btn-circle btn-xl" data-toggle="modal" data-target="#sideModalTRSuccessDemo" data-backdrop="false" title="Rate Me!"><i class="fa fa-thumbs-up"></i>
                            </button>
            </div>
    </div>
    &nbsp;
       <br>
       @if(isset($challs))
       @foreach ($challs as $ch)    
       <div class="list-group  custom-list">
            <a href="{{route('challenge',['cid'=>$ch->id])}}" class="list-group-item list-group-item-action flex-column align-items-start " title="Solve Me!">
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
                @if($ch->rating!=0.0)
                <small ><i class="fas fa-star"style="color:orange"></i> {{number_format($ch->rating,1)}} </small>&nbsp;&nbsp;
                @endif
                @if($ch->counts!=0)
                <small ><i class="fas fa-users"style="color:black"></i>&nbsp; {{$ch->counts}}</small>
                @endif
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
<form id="smileys" method="POST"  action="{{route('feedback')}}">@csrf
<!-- Side Modal Top Right Success-->
<div class="modal fade right" id="sideModalTRSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            data-backdrop="false">
            <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header bg-indigo">
                        <p class="heading lead"><b>FeedBack</b></p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true" class="white-text">&times;</span>
                                                            </button>
                    </div>
                    <!--Body-->
                    
                    <div class="modal-body">
                        <div class="text-center">
                            <h4>Rate your Experience?</h4>
                                
                                <input type="radio" name="smiley" value="sad" class="sad">
                                <input type="radio" name="smiley" value="neutral" class="neutral">
                                <input type="radio" name="smiley" value="happy" class="happy" checked="checked">
                                
                           <label>Any Suggestions?</label>
                            <textarea name="suggestion" placeholder="(optional)"></textarea>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary-modal bg-indigo"><i class="fa fa-check"></i>Submit</button>
                        <a role="button" class="btn btn-outline-indigo waves-effect" data-dismiss="modal">No, thanks</a>
                    </div>
                    
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Side Modal Top Right Success-->
        </form>


@endsection