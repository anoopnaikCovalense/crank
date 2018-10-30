@extends('layouts.app')
@section('content')
 <link rel="stylesheet" href="{{ URL::asset('js/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="card">

<div class="row">      
        <br><label class="col-md-1" for="question">Question </label>
        <div class="col-md-10">
<input type="text" name="question" value=""><br>
          <br>

<form role="form" action="/wohoo" method="POST">
  
    <div class="multi-field-wrapper">
      <div class="multi-fields">
        <div class="multi-field">

 <input type="checkbox" class="form-check-input" id="check1" name="vehicle1" value="something">
 <label for="name">Option </label>
 <br>
          <input type="text" name="stuff[]">
          


           <button type="button" class="remove-field">Remove</button> 
        </div>
      </div>
      <br>
      <button type="button" class="add-field">Add field</button>

  </div>
  </div>
  </div>
  </div>
  </div>
</div>
</form>
<script>
$('.multi-field-wrapper').each(function() {
    var $wrapper = $('.multi-fields', this);
    $(".add-field", $(this)).click(function(e) {
        $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
    });
    $('.multi-field .remove-field', $wrapper).click(function() {
        if ($('.multi-field', $wrapper).length > 1)
            $(this).parent('.multi-field').remove();
    });
});
</script>

@endsection
