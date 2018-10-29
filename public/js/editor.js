var compile_status;
var run_status;
var sourcecode;
var language;
var cid;
var uid;
var output; 
var challenge_rating;
var current_minutes;
var time;
var time_taken;
var temp;
$(document).ready(function () {
  cid=$("#challengeid").val();
  uid=$("#userid").val();
  time=$("#time").val();
  countdown(time);
  function countdown(minutes,seconds) {
       window.seconds = (typeof seconds !== "undefined") ? seconds : 60;
       window.mins = (typeof minutes !== "undefined") ? minutes : 0;
      tick();
      function tick() {
          var counter = document.getElementById("timer");
          current_minutes = window.mins-1;
          window.seconds--;
          counter.innerHTML =
          current_minutes.toString() + ":" + (window.seconds < 10 ? "0" : "") + String(window.seconds);
          if( window.seconds > 0 ) {
              window.timeoutHandle=setTimeout(tick, 1000);
          } else {
              if(window.mins > 1){
                 
                //never reach “00? issue solved:Contributed by Victor Streithorst
                window.timeoutHandle = setTimeout(function () { countdown(window.mins); }, 1000);
              }
              else if(current_minutes=="0" && window.seconds=="00")
              {
                swal({
                  type: 'error',
                  title: 'Time Up...!',
                  text: 'Thank you',
                })
                var editor = ace.edit("editor");
                var code = editor.getValue();
                var lang = $("#mode").val();
                $.ajax(  
                  {
                    type:'POST',
                    url:'api/store',
                    data:{output:"Incomplete",uid:uid,cid:cid,time_taken:0,code:code,cstatus:"Incomplete",rstatus:"Incomplete",language:lang,rating:0.0},
                    error:function(_res)
                    {
                      alert("some error");
                    },
                    success:function(_response)
                    {
                    swal({ title: "Submit Successfully !",
                    text: "You clicked the button!",
                    type: "success"}).then(okay => {
                                                    if (okay) {
                                                    window.location.href = base_url + "/submissions";
                                                    }
                                                    }) 
                    }
                  });
              }
          }
      }     
    }
  $("#CSubmit").hide();
  var editor = ace.edit("editor");
  editor.setTheme("ace/theme/monokai");
  editor.getSession().setMode("ace/mode/javascript");
  $('#mode').on('change', function () {
    let newMode = $("#mode").val();
    editor.getSession().setMode({
      path: "ace/mode/" + newMode,
      v: Date.now()
    });
  });
  $("#Errorbutton").hide();
  $("#Run").click(function () {
    // clearTimeout(window.timeoutHandle);
    var editor = ace.edit("editor");
    var code = editor.getValue();
    var lang = $("#mode").val();
    if (code.length == 0) {
      $("#loading").hide();
      swal({
        type: 'error',
        title: 'Oops...!!!!!!',
        text: 'Please Enter  the Code!!!!',
        footer: '<a href>Why do I have this issue?</a>'
      })
      return;
    }
    $("#loading").show();
    $.ajax({
      type: 'POST',
      url: 'api/compile',
      data: { code: code, lang: lang },
      error: function (err) {
        $("#loading").hide();
        $("#error").html("");
        $("#Errorbutton").show(); 
        $("#error").html("Some Error with API ");
      },
      success: function (result) {
        // countdown(window.minutes, window.seconds);
        $("#Errorbutton").hide();
        $("#CSubmit").show();
        console.log(result);
        $("#loading").hide();
        if (result.body.exitcode!=0)
        {
         if(result.body.error=="")
         {
          $("#Errorbutton").show();
          $("#error").html("");
          $("#error").html(result.body.stdout);
         }
         else {
          $("#Errorbutton").show();
          $("#Submit").prop("disabled",true);
          $("#error").html("");
          $("#error").html(result.body.error);
        }
       } 
        else if (result.status== "OK") {
          console.log(result)
          $("#output").html(result.output);
          compile_status = result.status;         
          run_status=result.status;
          sourcecode=code;  
          language=lang;   
          output=result.output;     
          cid=$("#challengeid").val();
          uid=$("#userid").val();
          $("#Submit").prop("disabled", false);
          closeNav();
        }
      }
    });
  });
  $("#CSubmit").click(function()
  {
    $(function(){
      $("#modalRating input[name=rating]").click(function(e){
           window.rating = $(this).val();
           window.prevRating = rating;
           console.log(window.rating)
           challenge_rating=window.rating;
       });
      });
      function pad(n, width, z) {
        z = z || '0';
        n = n + '';
        return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
      }
      $("#Submit").click(function()
      {
        time_taken="00:"+pad((time-current_minutes), 2)+":"+seconds+".00";
         $.ajax(  
        {
          type:'POST',
          url:'api/store',
          data:{output:output,uid:uid,cid:cid,time_taken:time_taken,code:sourcecode,cstatus:compile_status,rstatus:run_status,language:language,rating:challenge_rating},
          error:function(_res)
          {
            alert("some error");
          },
          success:function(_response)
          {
            swal({  position:'top-end',
                    title: "Submit Successfully !",
                    type: "success"}).then(okay => {
                                                    if (okay) {
                                                    window.location.href = base_url + "/submissions";
                                                    }
                                                    })
        }
        });
      });
});
});


