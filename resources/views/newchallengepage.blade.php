@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form method="POST"  action="{{route('validator')}}">
    @csrf
<div class="container">
    <br>
     <p class="aside block-margin margin-large">Get started by providing the initial details needed to create a challenge</p>  
          <div class="row">
                <label class="col-md-2"  for="challengename">Challenge Name </label>
                    <div class="col-md-10">
                        <input value="{{old('cname')}}" id="cname" type="text" name="cname" class="span12">
                            @if ($errors->has('cname'))
                                <span class="text-danger">{{ $errors->first('cname') }}</span>
                            @endif
                    </div>
          </div>   
          <div class="row ">
            <label class=" col-md-2"  for="description"> Description</label>
                <div class="col-md-10">
                    <textarea rows="2" cols="100" id="preview" class="form-control form-control-lg description span16" placeholder="Write a short summary about the challenge" name="desc">{{ old('desc') }}</textarea>
                        @if ($errors->has('desc'))
                        <span class="text-danger">{{ $errors->first('desc') }}</span>
                        @endif
                </div>
          </div>
        <div class="row">
              <label for="name" class=" col-md-2" > Problem Statement  </label>
                <div class="col-md-10">
                    <textarea name="statement" class="ckeditor block  profile-input"> {{ old('statement') }}</textarea>
                        @if ($errors->has('statement'))
                            <span class="text-danger">{{ $errors->first('statement') }}</span>
                        @endif
                </div>
        </div>
         <div class="row">
                <label class=" col-md-2"  for="email"> Input Format </label>
                    <div class="col-md-10">
                        <textarea name="ipformat" class="ckeditor block  profile-input" > {{ old('ipformat') }} </textarea>
                        @if ($errors->has('ipformat'))
                            <span class="text-danger">{{ $errors->first('ipformat') }}</span>
                        @endif
                    </div>
        </div>    
    <div class="row">
        <label class=" col-md-2"  for="email">Constraints  </label>
            <div class="col-md-10">
            <textarea name="constraints" class="ckeditor block  profile-input" > {{ old('constraints') }} </textarea>
                 @if ($errors->has('constraints'))
                  <span class="text-danger">{{ $errors->first('constraints') }}</span>
                  @endif
             </div>
    </div>
    <div class="row ">
        <label class=" col-md-2"  for="email">Output Format </label>
            <div class="col-md-10">
                <textarea name="opformat" class="ckeditor block  profile-input"  > {{ old('opformat') }} </textarea>
                    @if ($errors->has('opformat'))
                    <span class="text-danger">{{ $errors->first('opformat')}}</span>
                    @endif
             </div>
    </div>
    <div class="row">
        <label class=" col-md-2"  for="TestCaseInputFormat:"> Test Case Input Format </label>
            <div class="col-md-10">
                <input value="{{old('testcaseipformat')}}" id="testcaseipformat" type="text" name="testcaseipformat" class="span12">
                    @if ($errors->has('testcaseipformat'))
                        <span class="text-danger">{{ $errors->first('testcaseipformat')}}</span>
                    @endif
            </div>
    </div>
    <div class="row">
        <label class=" col-md-2"  for="TestCaseOutputFormat"> Test Case Output Format </label>
            <div class="col-md-10">
                <input value="{{ old('testcaseopformat') }}"  id="testcaseopformat" type="text" name="testcaseopformat" class="span12">
                    @if ($errors->has('testcaseopformat'))
                        <span class="text-danger">{{ $errors->first('testcaseopformat')}}</span>
                    @endif
            </div>
    </div>
         
  <div class="row ">
    <label class=" col-md-2"  for="tags">Tags</label>
    <div class="col-md-10">
        <input value="{{ old('tags') }}" name="tags" id="tags" type="text" class="span12" >
         @if ($errors->has('tags'))
          <span class="text-danger">{{ $errors->first('tags') }}</span>
         @endif
    </div>
  </div>
</div>
    <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-check"></i>&nbsp;Save</button>
</form>
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
var allEditors = document.querySelectorAll('.ckeditor');
for (var i = 0; i < allEditors.length; ++i) {
CKEDITOR.replace(allEditors[i].attr('id'));
}
</script>
@endsection