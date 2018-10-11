var compile_status;
var run_status;
var sourcecode;
var language;
var cid;
var uid;
var output; 

$(document).ready(function () {

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
        $("#Errorbutton").hide();
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
        
        }
      }
    });

  });
  $("#Submit").click(function()
  {
          $.ajax(
        {
          type:'POST',
          url:'api/store',
          data:{output:output,uid:uid,cid:cid,code:sourcecode,cstatus:compile_status,rstatus:run_status,language:language},
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
    window.location.href = " base_url + "/submissions;
  }
}) 
          }
        }
      );
});

});


