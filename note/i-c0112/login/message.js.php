<?php
header('content-type: application/javascript');
require_once('config.php');
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

function load_msg(_sid) {
    if (_sid === "undefined") {
	_sid = false;
    }

    $.ajax({
        url: ((!_sid)? "downloadmsg.php": "downloadonemsg.php"),
        type: "POST",
        dataType: "json",
        data : ((!_sid)? {}: {sid: _sid}),
        success: function(data, status, jqXHR){
            if (data.error) {
                alert("Failed to fetch data from server!");
                return;
            }
            if (!_sid) {
                var o = $('#output');
                o.html('');
                var html = '';
                for(var i in data) {
                    var dt = new Date(data[i].timestamp * 1000);
                    html +=
                    '<div class="msg" id=\"' + data[i].sid + '\"><br/><br/><span class="userAcc" >' + data[i].userAcc + '</span>' + '    發表於    ' + dt.toLocaleString()
                    + '<p class="subject">' + data[i].subject + '</p>' + '<p class="content">' + data[i].content.replace(/\n/g, "<br>") + '</p>'
            		+ '<button class="del">Delete</button></div>';
                }
                o.html(html);
            }
	    else {
		var dt = new Date(data[0].timestamp * 1000);
                var html = '';
                html +=
                    '<div class="msg" id=\"' + data[0].sid + '\"><br/><br/><span class="userAcc" >' + data[0].userAcc + '</span>' + '    發表於    ' + dt.toLocaleString()
		    + '<p class="subject">' + data[0].subject + '</p>'
			+ '<p class="content">' + data[0].content.replace(/\n/g, "<br>") + '</p>'
                    + '<button class="del">Delete</button></div>';
                $(".msg#" + _sid).html('').html(html);
            }
            
            $(".msg button").each(function(i){
                var disable = !($(this).siblings(".userAcc").html() === <?php print "'$_SESSION[$session]'";?>);
                this.disabled = disable;
		if (!disable) {
		    $(this).addClass("enabled").siblings("p").attr("contenteditable", (!disable).toString());
		}
	    });

	    prevent = false;
        },
        error: function(jqXHR, status, err){
            console.log(err);
        }
    });
}

function delete_msg_from_server(e) {
    var _cancel = $("#cancel");
    if (_cancel.length) {
        _cancel.click();
    }
    
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
                alert(data);
            }
            else {
                $(btn).parent().remove();
            }
        },
        error: function(jqXHR, status, err){
            alert(err);
        }
    });
}

var prevent = false;
function modify_text(e) {
    if (prevent)
	return;
    prevent = true;

    // confirm changes
    if (confirm("確認修改?"+e.target.innerHTML)) {
	modify_msg_from_server(e);
    }
    else {
	load_msg(e.target.parentNode.id);
    }
}

// modify confirmed
function modify_msg_from_server(e) {
    var el = e.target;
    var msg = el.parentNode;
    var _sid = msg.id;
    var jq = $(msg);
    var _subject = jq.children(".subject").html();
    console.log(_subject + '\n');
    var _content = jq.children(".content").html().replace(/<\/div>/g, '').replace(/(<br>|<div>)/g, "\n");
    console.log(_content + '\n');
    
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
                load_msg(_sid);
	    }
        },
        error: function(jqXHR, status, err){
            alert(err);
        }
    });
}
