$(function() {
    // index.php
    if (window.location.pathname.toLowerCase() == "/login/" || window.location.pathname.toLowerCase() == "/login/index.php") {
        $("#reg").click(function() {
            window.location.assign("/login/register.php"); 
        });
    
        $("#update").click(function (e){
		load_msg();
	});
       
	// $("p") means $(".subject,.content")	
        $("#output").on("click", "button.del", delete_msg_from_server)
	.on("blur", "p.subject, p.content", modify_text);

        
        $("#input_area").on("click", "#send_text", send_text);
    }
    
    // register.php
    if (location.pathname == "/login/register.php") {
        $("#back").click(function(){
            window.location.assign("/login/");
        });
    }
});
