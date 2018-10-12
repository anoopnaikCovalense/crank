@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">

<div class="card">

<div class="card-header">Registration Confirmed</div>
<div class="card-body">
Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a>
</div>
</div>
</div>
</div>
</div>
@endsection