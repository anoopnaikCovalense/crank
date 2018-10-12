@extends('layouts.app')
@section('content')
<div class="container" style="padding-top:170px">
<div class="row justify-content-center">
<div class="col-md-8">

<div class="card">

<div class="card-header bg-indigo"><span style="color:white">Registration Confirmed</span></div>
<div class="card-body">
Your Email is successfully verified. <br>
<br>Click here to <a href="{{url('/login')}}">login</a>
</div>
</div>
</div>
</div>
</div>
@endsection