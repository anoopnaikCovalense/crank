@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<form method="POST" action="{{route('edit',['cid'=>$challenge->id])}}">
    @csrf
<div class="container">
    <br>
     <p class="aside block-margin margin-large">Update your challenge details</p>
     
          <div class="row">
    <label class="col-md-2" for="challengename">Challenge Name </label>  
    <div class="col-md-10">
    <input id="cname" type="text" name="challengename"  value="{{$challenge->cname}}" class="span12" required>
    </div>
  </div>

         
         
          <div class="row ">
    <label class="col-md-2" for="description">Description</label>
    <div class="col-md-10">
        <textarea style="font-size:16px" rows="4" cols="100" id="preview"  type="text"  class="form-control form-control-lg" class="description span16" value="{{$challenge->desc}}" name="description">{{$challenge->desc}}</textarea>

    </div>
  </div>
         
         
          <div class="row " style="padding-bottom: 30px;">
              <label for="name" class="col-md-2" >Problem Statement</label>
    <div class="col-md-10">
    <textarea name="problemstatement" class="ckeditor block  profile-input" value="{{$challenge->statement}}">  </textarea>
    </div>
  </div>
         
         
          <div class="row " style="padding-bottom: 30px;">
              <label class="col-md-2"  for="email">  Input Format</label>
    <div class="col-md-10">
    <textarea name="inputformat" class="ckeditor block  profile-input" value="{{$challenge->ipformat}}">  </textarea>
    </div>
  </div>
         
         
         
         <div class="row " style="padding-bottom: 30px;">
    <label class="col-md-2"  for="email">Constraints</label>
    <div class="col-md-10">
    <textarea name="constraints" class="ckeditor block  profile-input" value="{{$challenge->constraints}}">  </textarea>
    </div>
  </div>
    
          <div class="row ">
    <label class="col-md-2"  for="email">Output Format</label>
    <div class="col-md-10">
    <textarea name="outputformat" class="ckeditor block  profile-input" value="{{$challenge->opformat}}">  </textarea>
    </div>
  </div>
         
  <div class="row " style="padding-bottom: 30px;">
    <label class="col-md-2"  for="challengename"> Test Case Input Format </label>
    <div class="col-md-10">
    <input id="testcaseipformat" type="text" value="{{$challenge->testcaseipformat}}" name="testcaseipformat" class="span12">
    </div>
  </div>

<div class="row " style="padding-bottom: 30px;">
    <label class="col-md-2"  for="challengename"> Test Case Output Format </label>
    <div class="col-md-10">
    <input id="testcaseopformat" type="text" name="testcaseopformat"  value="{{$challenge->testcaseopformat}}"class="span12">
    </div>
  </div>      
  <div class="row ">
    <label class="col-md-2"  for="email">Tags</label>
    <div class="col-md-10">
        <input name="tags" id="tags" type="text" class="span12" value="{{$challenge->tags}}">
    </div>
  </div>         
</div>
    <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-check"></i>&nbsp;Update</button>
        </form>
         
    </body>
    <style>
            body {
                background-color: #f3f7f7;
            }
            form > div.container {
                margin-top: 30px;
                background: #fff;
                box-shadow: 0 6px 16px 0 rgba(115,143,147,.4);
            }
            .row {
               padding-bottom: 30px;
            }
            .row label {
                position: relative;
                top: 5px;
                text-align: right;
                right: -15px;
            }
            form > div.container > p {
                text-align: center;
                font-size: 25px;
                font-weight: 300;
                padding: 20px 0;
            }
            button.btn {
                width: 87%;
margin: 20px auto 100px auto;
border:0;
border-radius: 0;
outline: none;
            }
            button.btn:active {
                outline:none;
            }
button.btn::-moz-focus-inner {
  border: 0;outline:none;
}
        </style>
<script src="https://cdn.ckeditor.com/4.10.0/full-all/ckeditor.js"></script>

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