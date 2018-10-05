@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container text-center" style="  padding-top:10px;">
      <div>
          <div class="row">
            <div class="col-md-6 text-center"></div>
                <div class="col-md-6 text-right">
                        <br>
                        <a href="{{route('newchallenge')}}" class="btn btn-indigo">Create New Challenge </a>           
                </div>
            </div>
          &nbsp;
            <br>
            @if(isset($challenges))
            <div class="list-group">
            
                @foreach($challenges as $challenge)
                    <div class="list-group-item list-group-item-action flex-column align-items-start custom-list"
              data-link="{{route('submittedusers',['cid'=>$challenge->challenge_id])}}">
                    <div class="d-flex w-100 justify-content-between">
                    <h3 class="mb-1"><span style="color:black"><i class="fa fa-trophy" aria-hidden="true" style="color:mediumseagreen"></i>&nbsp;{{$challenge->cname}}</span></h3>
                    <small>{{$challenge->parsedTime}}</small>     
            </div>
                <p class="mb-1"><span style="color:blue">{{$challenge->desc}}Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <span class="pull-center">
                    <a href="{{route('prevdetails',['cid'=>$challenge->challenge_id])}}" class="btn  btn-indigo" role="button"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Update</a>
                    <button  onclick="delete_record(this)" id="{{$challenge->challenge_id}}" id="button1"class="btn btn-indigo" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;Delete</button>
                </span>
              <div class="d-flex justify-content-end">            
              <small ><i class="fa fa-users"></i> &nbsp; {{$challenge->count}}</small>
              </div>

       </div>
              @endforeach
     </div> 
              @else
              <b>No Challenges!!</b>
              @endif
        
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$('#button1').click(() => {


  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "http://localhost/crank/public/del?cid=" + this.id;
    swal("Poof! Your file has been deleted !", {
      icon: "success",
    });

  } else {
    swal("Your  file is safe!");
  }
});
});


function delete_record($this){
    var request_data = $this.id;
       swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
$.ajax({
    type:'GET',
    url: "delete?cid=" + request_data,
    success: function(data){
         if(data=="true"){
          swal("Poof! Your file has been deleted !", {
      icon: "success",  
    });
    location.reload();
         }else if(data=="false"){
          swal("Poof! Your file WAS NOT  deleted !", {
      icon: "success",
    });
         }
    }

     })
  } else {
    swal("Your  file is safe!");
  }
});
}

</script>


@endsection