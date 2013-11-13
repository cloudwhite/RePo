// 使用ajax不用form的submit，所以要自行判斷NOT NULL的欄位是否填妥
// 留言成功送出後，記得將input_area的值清空，避免重複發送情形
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
                       alert("server-side新增留言失敗!");
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
                '<br/><br/><span class="userAcc" >' + data[i].userAcc + '</span>' + '    發表於    ' + dt.toLocaleString()
                + ':<p class="subject">' + data[i].subject + '</p>' + '<p class="content">' + data[i].content + '</p>'
                + '<br/>====================================';
            }
            o.html(html);
        }
    });
}
