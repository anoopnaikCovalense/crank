@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



<div class="card-body" style="overflow-y:auto">
    <div class="list-group">

        @foreach($mcq as $mcq)

  <a href="{{route('mcqquestion')}}" class="list-group-item list-group-item-action flex-column align-items-start custom-list">

        <div class="w-100" style="display:block;">

            <h5 class="mb-1 float-left"><b>Submitted By:</b> {{ $mcq->name }} <small>({{$mcq->email}})</small></h5>
           

            <small class="float-right" style="font-size: 140%;vertical-align: middle; display:inline-block;">{{$mcq->score}}</small>


        </div>
@endforeach
        
</a>

    </div>



</div>


@endsection