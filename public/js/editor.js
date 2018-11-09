var compile_status;
var run_status;
var sourcecode;
var language;
var cid;
var uid;
var output; 
var challenge_rating;
var minutes;
var time_taken;
var current_minutes;
var seconds =00;
var t;
var timer_is_on = 0;
function timedCount() {
    if(seconds<10)
    document.getElementById('txt').innerHTML =(current_minutes)+":0"+seconds;
    else
    document.getElementById('txt').innerHTML =(current_minutes)+":"+seconds;
    if(seconds>0)
    seconds = seconds - 1;
    if(seconds==00 && current_minutes>0)
    {
      document.getElementById('txt').innerHTML =(current_minutes)+":00";
      current_minutes=current_minutes-1;seconds=59;
      
    }
    if(seconds==00 && current_minutes==0)
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
            alert("Some Error");
          },
          success:function(_response)
          {
          swal({ title: "Submit Successfully !",
          type: "success"}).then(okay => {
                                          if (okay) {
                                          window.location.href = base_url + "/submissions";
                                          }
                                          }) 
          }
        });

    }
    else
    t = setTimeout(timedCount, 1000);    
}
function startCount() {
    if (!timer_is_on) {
        timer_is_on = 1;
        timedCount();
    }
}

function stopCount() {
    clearTimeout(t);
    timer_is_on = 0;
}
$(document).ready(function () {
  cid=$("#challengeid").val();
  uid=$("#userid").val();
  minutes=$("#time").val();
  current_minutes=minutes;
  startCount();
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
    stopCount();
    var editor = ace.edit("editor");
    var code = editor.getValue();
    var lang = $("#mode").val();
    if (code.length == 0) {
      $("#loading").hide();
      swal({
        type: 'error',
        title: 'Oops...!!!!!!',
        text: 'Please Enter  the Code!!!!',
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
        startCount();
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
        time_taken="00:"+pad((minutes-current_minutes), 2)+":"+seconds+".00";
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


