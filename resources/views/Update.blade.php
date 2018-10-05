@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<form method="POST" action="{{route('edit',['cid'=>$challenge->id])}}">
    @csrf
<div class="container">
   
    <h2> Update </h2>
     <!-- <p class="aside block-margin margin-large"> <i>Get started by providing the initial details needed to create a challenge.
         </i></p> -->
         
         
          <div class="row " style="padding-bottom: 30px;">
    <label class=" col-md-3"  for="challengename"><b>Challenge Name :</b> </label>  
    <div class="col-md-9">
    <input class="form-control form-control-lg" id="inputsm" type="text" name="challengename"  value="{{$challenge->cname}}" class="span12" required>
    </div>
  </div>

         
         
          <div class="row ">
    <label class=" col-md-3"  for="description"><b>Description :</b></label>
    <div class="col-md-9">
    <textarea rows="2" cols="100" id="preview"  type="text"  class="form-control form-control-lg" class="description span16" value="{{$challenge->desc}}" name="description">{{$challenge->desc}}</textarea>
     <!-- <small class="description pull-left sub-help"> Charaters left :140</small> -->
    </div>
  </div>
         
         
          <div class="row " style="padding-bottom: 30px;">
              <label for="name" class=" col-md-3" > <b>Problem Statement : </b> </label>
    <div class="col-md-9">
    <textarea name="problemstatement" class="ckeditor block  profile-input" value="{{$challenge->statement}}">  </textarea>
    </div>
  </div>
         
         
          <div class="row " style="padding-bottom: 30px;">
              <label class=" col-md-3"  for="email"> <b> Input Format :</b></label>
    <div class="col-md-9">
    <textarea name="inputformat" class="ckeditor block  profile-input" value="{{$challenge->ipformat}}">  </textarea>
    </div>
  </div>
         
         
         
         <div class="row " style="padding-bottom: 30px;">
    <label class=" col-md-3"  for="email"><b> Constraints : </b> </label>
    <div class="col-md-9">
    <textarea name="constraints" class="ckeditor block  profile-input" value="{{$challenge->constraints}}">  </textarea>
    </div>
  </div>
    
          <div class="row ">
    <label class=" col-md-3"  for="email"><b> Output Format : </b> </label>
    <div class="col-md-9">
    <textarea name="outputformat" class="ckeditor block  profile-input" value="{{$challenge->opformat}}">  </textarea>
    </div>
  </div>
         
  <div class="row " style="padding-bottom: 30px;">
    <label class=" col-md-3"  for="challengename"><b> TestCase InputFormat :</b> </label>
    <div class="col-md-9">
    <input class="form-control form-control-lg" id="inputsm" type="text" value="{{$challenge->testcaseipformat}}" name="challengename" class="span12">
    </div>
  </div>

<div class="row " style="padding-bottom: 30px;">
    <label class=" col-md-3"  for="challengename"><b> TestCase OutputFormat :</b> </label>
    <div class="col-md-9">
    <input class="form-control form-control-lg" id="inputsm" type="text" name="challengename"  value="{{$challenge->testcaseopformat}}"class="span12">
    </div>
  </div>      
  <div class="row ">
    <label class=" col-md-3"  for="email"><b> Tags : </b> </label>
    <div class="col-md-9">
        <input name="tags" class="form-control form-control-lg" id="inputsm" type="text" class="span12" value=" {{$challenge->tags}}">
    </div>
  </div>
          <div align="right" style="padding-bottom:20px">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
              <hr style="background-color: black;">
              <button type="submit"  class="btn btn-success"><i class="fa fa-check">Save</i></button>
          </div>
          
            
</div>
        </form>
         
    </body>
    <style>
            .row{
               padding-bottom: 30px;
            }
            .row{
               padding-bottom: 30px;
            }
        </style>
<script src="https://cdn.ckeditor.com/4.10.0/standard-all/ckeditor.js"></script>

<script>

function codeAddress() {
    
    var object = {!! json_encode($challenge->toArray()) !!};
  
var problemstatement=object['statement'];
   var editor = CKEDITOR.instances['problemstatement'];
   editor.setData(problemstatement);


   var inputformat=object['ipformat'];
   var editor = CKEDITOR.instances['inputformat'];
   editor.setData(inputformat);

   var constraints=object['constraints'];
   var editor = CKEDITOR.instances['constraints'];
   editor.setData(constraints);

   var outputformat=object['opformat'];
   var editor = CKEDITOR.instances['outputformat'];
   editor.setData(outputformat);
}
window.onload = codeAddress;


</script>


@endsection