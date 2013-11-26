$(function() {
    // index.php
    if (window.location.pathname == "/login/" || window.location.pathname == "/login/index.php") {
        $("#reg").click(function() {
            window.location.assign("/login/register.php"); 
        });
    
        $("#update").click(load_msg);
        
        $("#output").on("click", "button.del", delete_msg_from_server)
        .on("click", "button.modify", edit_mode);
        
        $("#input_area").on("click", "#send_text", send_text)
        .on("click", "#mod_text", modify_msg_from_server)
        .on("click", "#cancel", view_mode);
    }
    
    // register.php
    if (location.pathname == "/login/register.php") {
        $("#back").click(function(){
            window.location.assign("/login/");
        });
    }
});
