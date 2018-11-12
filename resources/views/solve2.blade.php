<div class="container">
    <div id="quiz1"></div>
</div>
<link href="https://storage.googleapis.com/chydlx/plugins/dlx-quiz/css/main.css" rel="stylesheet">
<style>
.container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  background: linear-gradient(to top right, #0077ea 0%, dodgerblue 100%);
}
#quiz1 {
  width: 560px;
  background: #fff;
  padding: 2rem;
  border-radius: 3px;
}
</style>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="{{ asset('js/quiz1.js') }}" ></script>
<script>
console.log($("#quiz1").dlxQuiz({}))
$("#quiz1").dlxQuiz({
    quizData: {
        "questions": [{
            "q": "Look at the following selector: $(\"div\")<br/> What does it select?",
            "a": ["All div elements"],
            "options": [
                "All div elements",
                "The first div element",
                "All elements with the class \"div\""
            ]
        }, {
            "q": "Which of the following is correct",
            "a": ["jQuery is a JSON Library","something"],
            "options": [
                "jQuery is a JSON Library",
                "jQuery is a JavaScript Library"
            ]
        }, {
            "q": "jQuery uses CSS selectors to select elements?",
            "a":["True"],
            "options": [
                "True",
                "False"
            ]
        }, {
            "q": "Which sign does jQuery use as a shortcut for jQuery?",
            "a": ["the $ sign"],
            "options": [
                "the % sign",
                "the $ sign",
                "the ? Sign"
            ]
        }, {
            "q": "Is jQuery a library for client scripting or server scripting?",
            "a": ["Client scripting"],
            "options": [
                "Client scripting",
                "Server scripting",
            ]
        }]
    }
});
</script>