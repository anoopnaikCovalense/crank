@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<style type="text/css" media="screen">
    body {
        overflow: hidden;
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
        <b>Contraints:</b><br>
        {{$challenge->constraints}}
        <br><br>
        <b>Output Format:</b><br>
        {{$challenge->opformat}}
        <br><br>
       
      </b>
    </div>
  </div>
</div>
<div class="col-md-6" style="padding:0%">
      <div class="card" style="height:92vh;width=100%">
        <div class="card-header bg-indigo  text-white float-left">
            <span>Solution</span>
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
    <!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776</span> -->
          <button  type="button" class="btn btn-danger buttons"onclick="openNav()" id="Errorbutton">Error</button>
          <button   type="button" style="line-height:0.5" id="Run" class="btn btn-success buttons"><i class="fa fa-play-circle"> Run</i></button>
          <button  type="button"  id="Submit"class="btn btn-success buttons" disabled="disabled"><i class="fa fa-check"> Submit</i></button>
          
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
        </div>      
    </div>
  </div>
</div>
<div  id="loading"class="loading" style="display:none">Loading&#8230;</div>
@endsection