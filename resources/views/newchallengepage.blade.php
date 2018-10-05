@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<form method="POST"  action="{{route('validator')}}">
    @csrf
<div class="container">
    <br>
     <p class="aside block-margin margin-large"> <i>Get started by providing the initial details needed to create a challenge.
         </i></p>  
          <div class="row " style="padding-bottom: 30px;">
                <label class="col-md-3"  for="challengename"><b>Challenge Name:</b> </label>
                    <div class="col-md-9">
                        <input value="{{old('cname')}}" class="form-control form-control-lg" id="inputsm" type="text" name="cname" class="span12">
                            @if ($errors->has('cname'))
                                <span class="text-danger">{{ $errors->first('cname') }}</span>
                            @endif
                    </div>
          </div>   
          <div class="row ">
            <label class=" col-md-3"  for="description"><b> Description:</b></label>
                <div class="col-md-9">
                    <textarea rows="2" cols="100" id="preview"  class="form-control form-control-lg" class="description span16" placeholder="Write a short Summary about the challnege" name="desc">{{ old('desc') }}</textarea>
                        @if ($errors->has('desc'))
                        <span class="text-danger">{{ $errors->first('desc') }}</span>
                        @endif
                </div>
          </div>
        <div class="row " style="padding-bottom: 30px;">
              <label for="name" class=" col-md-3" > <b>Problem Statement: </b> </label>
                <div class="col-md-9">
                    <textarea name="statement" class="ckeditor block  profile-input"> {{ old('statement') }}</textarea>
                        @if ($errors->has('statement'))
                            <span class="text-danger">{{ $errors->first('statement') }}</span>
                        @endif
                </div>
        </div>
         <div class="row " style="padding-bottom: 30px;">
                <label class=" col-md-3"  for="email"> <b>Input Format: </b></label>
                    <div class="col-md-9">
                        <textarea name="ipformat" class="ckeditor block  profile-input" > {{ old('ipformat') }} </textarea>
                        @if ($errors->has('ipformat'))
                            <span class="text-danger">{{ $errors->first('ipformat') }}</span>
                        @endif
                    </div>
        </div>    
    <div class="row " style="padding-bottom: 30px;">
        <label class=" col-md-3"  for="email"><b>Constraints: </b> </label>
            <div class="col-md-9">
            <textarea name="constraints" class="ckeditor block  profile-input" > {{ old('constraints') }} </textarea>
                 @if ($errors->has('constraints'))
                  <span class="text-danger">{{ $errors->first('constraints') }}</span>
                  @endif
             </div>
    </div>
    <div class="row ">
        <label class=" col-md-3"  for="email"><b>Output Format :</b> </label>
            <div class="col-md-9">
                <textarea name="opformat" class="ckeditor block  profile-input"  > {{ old('opformat') }} </textarea>
                    @if ($errors->has('opformat'))
                    <span class="text-danger">{{ $errors->first('opformat')}}</span>
                    @endif
             </div>
    </div>
    <div class="row " style="padding-bottom: 30px;">
        <label class=" col-md-3"  for="TestCaseInputFormat:"><b> TestCase InputFormat:</b> </label>
            <div class="col-md-9">
                <input value="{{old('testcaseipformat')}}" class="form-control form-control-lg" id="testcaseipformat" type="text" name="testcaseipformat" class="span12">
                    @if ($errors->has('testcaseipformat'))
                        <span class="text-danger">{{ $errors->first('testcaseipformat')}}</span>
                    @endif
            </div>
    </div>
    <div class="row " style="padding-bottom: 30px;">
        <label class=" col-md-3"  for="TestCaseOutputFormat"><b> TestCase OutputFormat:</b> </label>
            <div class="col-md-9">
                <input value="{{ old('testcaseopformat') }}"  class="form-control form-control-lg" id="testcaseopformat" type="text" name="testcaseopformat" class="span12">
                    @if ($errors->has('testcaseopformat'))
                        <span class="text-danger">{{ $errors->first('testcaseopformat')}}</span>
                    @endif
            </div>
    </div>
         
  <div class="row ">
    <label class=" col-md-3"  for="tags"><b>Tags :</b> </label>
    <div class="col-md-9">
        <input value="{{ old('tags') }}" name="tags" class="form-control form-control-lg" id="inputsm" type="text" class="span12" >
         @if ($errors->has('tags'))
          <span class="text-danger">{{ $errors->first('tags') }}</span>
         @endif
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
var allEditors = document.querySelectorAll('.ckeditor');
for (var i = 0; i < allEditors.length; ++i) {
CKEDITOR.replace(allEditors[i].attr('id'));
}
</script>
@endsection