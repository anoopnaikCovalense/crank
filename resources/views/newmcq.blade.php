@extends('layouts.app')
@section('content')
<form role="form" action="{{route('newmcqs')}}" method="POST">
    {{ csrf_field() }}
<label>Title</label>
<input type="text" id="title" name="title" value="" >
<br>
<label>Description</label>
<input type="text" id="desc"  name="desc"value="" >
<br>
<input type="button" id="add_question" value="Add Question" />
    <div id="question_fileds">
  </div>  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit">Button</button>
</form>
<style>
    div { padding:10px;}
</style>

<script type="text/javascript">
    let questionCounter = 0;
    let optionCounter = [];

    $('body').on("click", "#add_question", function () {
        questionCounter++;
        optionCounter[questionCounter] = 0;

        var question = '<div class="question"><div class="label" data-question-id="' + questionCounter + '">Question ' + questionCounter + ':</div><div class="content"><div class="card"><div class="row"><br><label class="col-md-1" for="question">Question</label><div class="col-md-10"><input type="text" name="challenge[questions][' + questionCounter + '][title]" value=""><br><br><div class="multi-field-wrapper"> <div class="multi-fields">'+
        '<div class="multi-field"><input type="checkbox" class="form-check-input" name="challenge[questions][' + questionCounter + '][answers][' + optionCounter[questionCounter] + ']"><input type="text" data-option-id="'+ optionCounter[questionCounter] +'" name="challenge[questions][' + questionCounter + '][options][' + optionCounter[questionCounter] + ']" value=""><button type="button" class="remove-field">Remove</button> </div> <button type="button" class="add-field">Add field</button><br></div></div></div></div></div></div></div></div>';

        $('#question_fileds').append(question);
        optionCounter[questionCounter]++;

        // $('#question_fileds').find("div.question:first").clone(true).appendTo("#question_fileds").find('div.multi-field').not(":first").remove();
        // $('#question_fileds').find("div.question:last").find('input').val('').focus();
    });
    
    $('#question_fileds').on("click", "button.add-field", function () {
        //  alert("add opt");
        // var textBox = document.getElementById("check1");
        //     textBox.value = option;
        //     option++;

        var question_id = $(this).parent().parent().parent().parent().parent().parent().parent().find('div.label').attr('data-question-id');
        var option_id = $(this).parent().find('div.multi-field:last').find('input[type=text]').attr('data-option-id');
        if (isNaN(option_id))
            option_id = 0;
        else
            option_id++;
        var option = '<div class="multi-field"><input type="checkbox" class="form-check-input" name="challenge[questions][' + question_id + '][answers][' + option_id + ']"><input type="text" data-option-id="'+ option_id +'" name="challenge[questions][' + question_id + '][options][' + option_id + ']" value=""><button type="button" class="remove-field">Remove</button> </div>';
        
        var $wrapper = $(this).parent();
        $(option).appendTo($wrapper).find('input').val('').focus();
    });

    $('#question_fileds').on("click", "button.remove-field", function () {
        $(this).parent().remove();
    });
</script>
@endsection


