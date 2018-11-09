@extends('layouts.app')
@section('content')
<br>

<div class="container">
<div class="list-group">
<a href="{{route('mcqsubmissions')}}" class="list-group-item list-group-item-action flex-column align-items-start user-access">
<div class="d-flex w-100 justify-content-between">
<h5 class="mb-1"><span style="color:black"><h3>Title</h3><span></h5>
<small>User</small>
<small>Score</small>
</div>
<!-- <small>jyrururt</small> -->
</a>
</div>
</div>
</div>
@endsection