@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<style type="text/css" media="screen">
    body {
        overflow: hidden;
    }
</style>
<script>
$(document).ready(function () {
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.setReadOnly(true);
});
</script>
<div>
  <div>    
    <div class="row">
      <div class="col-md-3">
        <div class="card" style="height:92vh;">
          <div class="card-header bg-indigo  text-white float-left">Problem</div>
          <div class="card-body" style="overflow-y:auto">
            <b>Name:</b><br>
            {{$challenge->cname}}
            <br> <br>
            <b>Description:</b><br>
            {{$challenge->desc}}
            <br> <br>
            <b>Problem Statement:</b><br>
            {{$challenge->statement}}
            <br> <br>
            <b>Input format:</b><br>
              {{$challenge->ipformat}}
            <br> <br>
            <b>Constraints:</b><br>
            {{$challenge->constraints}}
            <br> <br>
            <b>Output Format:</b><br>
            {{$challenge->opformat}}
            <br> <br>
            <b>Tags:</b><br>
          {{$challenge->tags}}
          <br>
            <br>
          </b>
         </div>
        </div>
    </div>
     <div class="col-md-6" style="padding:0%">
        <div class="card" style="height:92vh;width:100%">
         <div class="card-header bg-indigo text-white float-left">Code</div>
         <div style="padding: 0rem;" class="card-body">
            <div style="position:relative;height:84vh;" id="editor">{{ $submission->code }}</div>
                <textarea  id="content" name="content"disabled="disabled" hidden></textarea>
            </div>
              
            </div>
        </div>
    
    <div class="col-md-3">
        <div class="card"  style="height:92vh">
            <div class="card-header bg-indigo text-white">Output</div>
            <div class="card-body" style="overflow-y:auto;">
              <p>
                {{$submission->output}}
              </p>
            </div>
            
<!-- modal start -->
<div class="modal fade" id="rateSolutionModal" tabindex="-1" role="dialog" aria-labelledby="rateSolutionModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Rate the solution</h5>
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
        <a id="ratingLink" href="{{route('setstatus',['submissionid'=>$submission->id,'status'=>'Approved'])}}"><button class="btn btn-success"> Submit</button></a>
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- modal end -->            
            
            <div class="card-footer bg-indigo text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#rateSolutionModal"><i class="fa fa-thumbs-up"></i> Approve</button>
                <a href="{{route('setstatus',['submissionid'=>$submission->id,'status'=>'Rejected'])}}"><button class="btn btn-danger"><i class="fa fa-thumbs-down"></i> Reject</button></a>
            </div> 
            </div>    
        </div>      
      </div>
    </div>
</div>
<script>
    $(function(){
       $("#modalRating input[name=rating]").click(function(e){
            window.rating = $(this).val();
            $('#ratingLink').attr("href", (($('#ratingLink').attr("href").indexOf('&rating') == -1) ? ($('#ratingLink').attr("href") + "&rating="+window.rating) : $('#ratingLink').attr("href").replace("&rating="+window.prevRating, "&rating="+window.rating)));
            window.prevRating = rating;
        });
       var currentRating = {{ $submission->rating or 0 }};
       if (currentRating > 0)
       {
           $('#star'+currentRating).prop("checked", true);
       }
    });
</script>
@endsection