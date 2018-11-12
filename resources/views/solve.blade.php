@extends('layouts.app')
@section('content')
<div class="container">
    <div id="quiz1">
   
    </div>
</div>
<link href="https://storage.googleapis.com/chydlx/plugins/dlx-quiz/css/main.css" rel="stylesheet">
<style>
.container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  /* background: linear-gradient(to top right, #0077ea 0%, gray 100%); */
}
#quiz1 {
  width: 560px;
  background: #fff;
  padding: 2rem;
  border-radius: 3px;
}
</style>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<!-- <script src="{{ asset('js/quiz.js') }}" ></script> -->
<script  src="{{ URL::asset('js/quiz.js')}}"></script>
<script>
// console.log($("#quiz1").dlxQuiz({}))
console.log({!!$questions!!});
$("#quiz1").dlxQuiz({
    quizData: {
     "questions":{!! $questions !!}
     }
    
});
</script>

@endsection