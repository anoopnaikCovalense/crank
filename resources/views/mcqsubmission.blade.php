@extends('layouts.app')
@section('content')
<br>

<div class="container">
  
     @foreach($mcq as $mcq)
<div class="list-group">
   <br>

   <a href="{{route('submittedmcq')}}" class="list-group-item list-group-item-action flex-column align-items-start user-access">
<br>
       <div class="d-flex w-100 justify-content-between">
    
<h5 class="mb-1"><span style="color:black">{{$mcq->title}}<span></h5>
          
<small>{{$mcq->name}}</small>

</div>
<!-- <small>jyrururt</small> -->
</a>
</div>
    
    @endforeach
   
</div>
@endsection