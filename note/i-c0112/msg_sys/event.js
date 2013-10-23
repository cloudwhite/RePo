/**
 * @author i-c0112
 */

$(function(){
    $("#submit").click(function(){
            var _input = $("#input").val();
            $.ajax({
               url: "bbs.php",
               type: "POST",
               dataType: "json",
               data: {
                    userInput: _input
               },
               success: function(data, status, jqXHR){
                   console.log(data.Errno);
                   var dt = new Date(data.timestamp*1000);
                   console.log(data.timestamp);
                   console.log(dt);
                   _input += "\n\n發表於:";
                   _input += dt.toLocaleString();
                   _input += "\n====================================\n";
                   $("#display").append(_input);
               },
               error: function(){
                   console.log(data.Errno);
               }
            });
    });
});
