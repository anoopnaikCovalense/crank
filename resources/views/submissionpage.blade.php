@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
$(document).ready(function () {
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.setReadOnly(true);
});
</script>
<div style="overflow-x:hidden">
  <div>    
    <div class="row">
      <div class="col-md-3">
        <div class="card"  style="height:91.7vh">
            <div class="card-header bg-indigo  text-white float-left">
                <b>Challenge</b>
            </div>
            <div class="card-body" style="overflow-y:auto;padding-left:10px">
        @if(isset($challenge))   
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
        <br><br>
        <b>Tags:</b><br>
      {{$challenge->tags}}
        <br><br>
      </b>
      @else 
      <strong>No Submissions Yet..!!!</strong>
      @endif  
            </div>
 
        </div>
      </div>
      <div class="col-md-6" style="height:91.7vh">
        <div class="card" style="height:91.7vh">
            <div class="card-header bg-indigo text-white float-left">
                <span><b>Code</b></span>
            </div>
            <div style="padding: 0rem;" class="card-body">
            <div style="position:relative;height:84vh;" id="editor">{{ $sub[0]->code }}</div>
                <textarea  id="content" name="content"disabled="disabled" hidden></textarea>
            </div>
              
            </div>
        </div>      
    <div class="col-md-3" style="height:91.7vh">
        <div class="card" style="height:91.7vh">
            <div class="card-header bg-indigo text-white float-left">
                <span><b>Output</b></span>
            </div>
            <div class="card-body" style="overflow-y:auto;padding-left:10px">
           <h4> {{$sub[0]->output}}</h4>
            </div>
         
         
            <a href="{{route('challenge',['cid'=>$challenge->id])}}" class="btn btn-success" 
            ><i class="fa fa-retweet" aria-hidden="true"></i>
        <b>Resubmit<b></a>  
        </div>
      </div> 
      
      </div>  
    </div>
  </div>
</div>


@endsection