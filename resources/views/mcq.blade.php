@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<br>
<a href="{{route('newmcq')}}" class="btn btn-indigo" style="line-height: 1;">Add Questions</a>
<br>
@foreach($mcqs as $mcq)

  <a href="{{route('solvemcqs',['mcqid'=>$mcq->id])}}" class="btn btn-indigo">{{$mcq->title}}</a>

@endforeach
@endsection