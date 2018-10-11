<html>
<body>
Hi {{$user->name}}!!
<p><b>{{ $loggedInUserName }}</b> has taken the challenge <b>{{$user->cname}}</b>  . Click the below link to View the Submission.</p>
<a href="{{url('accept_reject?submissionid='.$submit->id.'&challengeid='.$submit->challenge_id)}}" target="_blank">Click Here</a>
</body>
</html> 