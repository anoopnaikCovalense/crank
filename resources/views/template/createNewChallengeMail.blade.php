<html>
<body>
Hi {{$user[0]->name}}!!
<h4>A new challenge has been created by {{Auth::user()->name}} . Click the below link to take it.</h4>
<a href="{{url('challenge?cid=' .$challenge->id )}}" target="_blank">Click Here</a>
</body>
</html> 