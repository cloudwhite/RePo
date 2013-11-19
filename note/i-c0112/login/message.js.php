<?php
header('content-type: application/javascript');
require('config.php');
?>

function send_text() {
    var subject = $("#subject");
    var content = $("#content");
    
    var subVal = subject.val();
    var txtVal = content.val();
    
    if (!subVal || !txtVal) {
        alert("請確定標題跟內容都填妥!");
        return;
    }
    
    $.ajax({
               url: "uploadmsg.php",
               type: "POST",
               dataType: "html",
               data: {
                    subject: subVal,
                    content: txtVal
               },
               success: function(data, status, jqXHR){
                   // return null if no error on server-side
                   if (data) {
                       alert("serverside新增留言失敗!");
                       return;
                   }
                   subject.val("");
                   content.val("");
                   load_msg();
               },
               error: function(jqXHR, status, err){
                   console.log(err);
               }
            });
}

function load_msg() {
    $.ajax({
        url: "downloadmsg.php",
        type: "POST",
        dataType: "json",
        success: function(data, status, jqXHR){
            if (data.error) {
                alert("Failed to fetch data from server!");
                return;
            }
            var o = $('#output');
            o.html('');
            var html = '';
            for(var i in data) {
                var dt = new Date(data[i].timestamp * 1000);
                html +=
                '<div class="msg" id=\"' + data[i].sid + '\"><br/><br/><span class="userAcc" >' + data[i].userAcc + '</span>' + '    發表於    ' + dt.toLocaleString()
                + '<p class="subject">' + data[i].subject + '</p>' + '<p class="content">' + data[i].content.replace("\n", "<br/>\n") + '</p>'
                + '<button class="del">Delete</button>'
                + '<button class="modify">Modify</button><br/>====================================</div>';
            }
            o.html(html);
            
            $(".msg button").each(function(i){
                var disable = !($(this).siblings(".userAcc").text() === <?php print "'$_SESSION[$session]'";?>);
                this.disabled = disable;
            });
        },
        error: function(jqXHR, status, err){
            console.log(err);
        }
    });
}

function delete_msg_from_server(e) {
    var btn = e.target;
    $.ajax({
        url: "deletemsg.php",
        type: "POST",
        dataType: "html",
        data: {
            sid: $(btn).parent()[0].id
        },
        success: function(data, status, err){
            if (data) {
                alert(data+"123321");
            }
            else {
                $(btn).parent().remove();
            }
        },
        error: function(jqXHR, status, err){
            alert(err);
        }
    });
};

function edit_mode(e) {
    var btn = e.target;
    $("#send_text").val("修改").attr("id", "mod_text");
    if (! $("#cancel").length) {
        $("#input_area").append("<button id='cancel'>取消</button>");
    }
    var jq = $(btn).parent();
    $("#subject").val(jq.children(".subject").html());
    $("#content").val(jq.children(".content").html());
    
    $(".selected").removeClass("selected");
    jq.addClass("selected");
}

function view_mode(e) {
    var btn = e.target;
    
    var jqInput = $(btn).parent();
    jqInput.children("#mod_text")
    .val("送出").attr("id", "send_text");
    jqInput.children("#subject, #content").val("");
    
    $(btn).remove();
    $(".selected").removeClass("selected");
}

function modify_msg_from_server(e) {
    var btn = e.target;
    
    var _sid = $(".selected").attr("id");
    var jq = $("#input_area");
    var _subject = jq.children("#subject").val();
    var _content = jq.children("#content").val();
    jq.children("#subject, #content").val("");
    
    $.ajax({
        url: "modifymsg.php",
        type: "POST",
        dataType: "html",
        data: {
            sid: _sid,
            subject: _subject,
            content: _content
        },
        success: function(data, status, err){
            if (data) {
                alert(data);
            }
            else {
                $("#selected").remove();
                load_msg();
            }
        },
        error: function(jqXHR, status, err){
            alert(err);
        }
    });
}
