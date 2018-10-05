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
      alert("Type the code..!!");
     
      return;
    }
    $("#loading").show();
    $.ajax({
      type: 'POST',
      url: 'api/compile',
      data: { code: code, lang: lang },
      error: function (err) {
        $("#loading").hide();
        console.log(err.responseJSON['output'])
        $("#error").html("");
        $("#Errorbutton").show(); 
        $("#error").html(err.responseJSON['output']);
      },
      success: function (result) {
        console.log(result);
        $("#loading").hide();
        if (result.body.run_status.stderr!="") {
          $("#Errorbutton").show();
          $("#error").html("");
          $("#error").html(result.body.run_status.stderr);
        }
        if (result.body.run_status.compile_status =="Error code: 1200") {
          $("#Errorbutton").show();
          $("#error").html(" 1200 error");  
        }
        else if (result['status'] == "OK") {
          console.log(result) 
          $("#output").html(result.output);
          compile_status = result.status;         
          run_status=result.body.run_status.status_detail;
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
              alert("Stored successfully");
              
              

           
          }
        }
      );
});

});


