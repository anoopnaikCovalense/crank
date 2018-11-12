@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<style type="text/css" media="screen">
    body {
        overflow: hidden;
    }
    #timer{
        color:white;
        text-align:center;
        font-weight: bold;
    }
.sidenav {    height:auto;
    width: 0;
    position: fixed;
    z-index: 1;
    top:8.3%;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition:0.5s;
    padding-top:30px;
    color:white;
}

.sidenav a {

    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size:30px;
    color: #818181;
    display: block;
    transition: 0.3s;
    
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height:20px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
    #editor {
        margin: 0;
        position: absolute;
        top: 5%;
        bottom: 0;
        left: 0;
        right: 0;
    }
    .buttons{
    padding-bottom: 50px;
    }
</style> 
<script  src="{{ URL::asset('js/editor.js') }}"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<body>
    <div id="mySidenav" class="sidenav" style="height:auto">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> 
        <br>
        <br>
        <p>Errors:</p>
        <br>
        <p id="error"></p>
    </div>
</body>
<div>
  <div>  
    <div class="row">
      <div class="col-md-3">
        <div class="card" style="height:92vh;">
            <div class="card-header bg-indigo  text-white float-left"style="height:11%">
            Challenge
            </div>
        <div class="card-body" style="overflow-y:auto;padding-left:10px">
        <textarea id="challengeid" hidden>{{$challenge->id}}</textarea>
        <textarea id="userid" hidden>{{Auth::user()->id}}</textarea>
        <textarea id="time" hidden>{{$challenge->time}}</textarea>
        <b>Name:</b><br>
        {{$challenge->cname}}
        <br><br>
        <b>Description:</b><br>
        {{$challenge->desc}}
        <br><br>
        <b>Problem Statement:</b><br>
        {{$challenge->statement}}
        <br><br>
        <b>Input format:</b><br>
          {{$challenge->ipformat}}
        <br><br>
        <b>Constraints:</b><br>
        {{$challenge->constraints}}
        <br><br>
        <b>Output Format:</b><br>
        {{$challenge->opformat}}      
      </b>
    </div>
  </div>
</div>
<div class="col-md-6">
      <div class="card" style="height:92vh;width:100%">
        <div class="card-header bg-indigo  text-white ">
            <label>Solution</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <i class="fa fa-clock"></i>
            <label id="txt"></label>
           <div  class=" float-right" style="width:30%">
                <select class="custom-select" id="mode" >
                <option  value="python">PYTHON</option>
                <option  value="php">PHP</option>
                <option value="java">Java</option>  
                <option  value="csharp">C#</option>
                <option value="javascript">JavaScript</option>
                </select> 
            </div>

        </div>
        <div style="padding: 0rem;" class="card-body">
            <div style="position:relative;height:73vh;" id="editor"></div>
                <textarea  id="content" name="content"disabled="disabled" hidden></textarea>
            </div>
            
    <div class="card-footer bg-indigo  text-white text-right" style="height:10vh" >   
          <button type="button" class="btn btn-danger buttons"onclick="openNav()" id="Errorbutton">Error</button>
          <button type="button" style="line-height:0.5" id="Run" class="btn btn-success buttons" ><i class="fa fa-play-circle"></i> Run</button>
          <button type="button"  id="CSubmit" class="btn btn-success buttons" data-toggle="modal" data-target="#rateSolutionModal"><i class="fa fa-check"></i> Submit</button>
    </div> 
 </form>
    </div>
</div>
    <div class="col-md-3">        
        <div class="card"  style="height:92vh">
            <div class="card-header bg-indigo  text-white " style="height:10vh">
                Output
            </div>
            <div class="card-body" style="overflow-y:auto;">
                <p id="output"></p>
            </div>      
<!-- modal start -->
<div class="modal fade" id="rateSolutionModal" tabindex="-1" role="dialog" aria-labelledby="rateSolutionModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Rate the Challenge</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="rating" id="modalRating">
            <input type="radio" id="star10" name="rating" value="10" /><label for="star10" title="Rocks!">10 stars</label>
            <input type="radio" id="star9" name="rating" value="9" /><label for="star9" title="Rocks!">9 stars</label>
            <input type="radio" id="star8" name="rating" value="8" /><label for="star8" title="Pretty good">8 stars</label>
            <input type="radio" id="star7" name="rating" value="7" /><label for="star7" title="Pretty good">7 stars</label>
            <input type="radio" id="star6" name="rating" value="6" /><label for="star6" title="Meh">6 stars</label>
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Meh">5 stars</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Kinda bad">4 stars</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Kinda bad">3 stars</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Sucks big time">2 stars</label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="Submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->            
            </div>
    </div>
  </div>
</div>
<div  id="loading"class="loading" style="display:none">Loading&#8230;</div>
<style>
.modal-open, .modal-open .modal {
    overflow-y: hidden !important;
}
</style>
@endsection