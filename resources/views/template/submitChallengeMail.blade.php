<html>
<body>
Hi {{$user[0]->name}}!!
<p><b>{{$submitted_user}}</b> has taken the challenge <b>{{$user[0]->cname}}</b>  . Click the below link to View the Submission.</p>
<a href="{{url('accept_reject?submissionid='.$submit->id.'&challengeid='.$submit->challenge->id)}}" target="_blank">Click Here</a>
</body>
</html> 