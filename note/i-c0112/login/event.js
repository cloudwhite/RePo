$(function() {
    // index.php
    if (window.location.pathname == "/login/" || window.location.pathname == "/login/index.php") {
        $("#reg").click(function() {
            window.location.assign("/login/register.php"); 
        });
    
        $("#send_text").click(function(){
            send_text();
        });
    }
    
    // register.php
    if (location.pathname == "/login/register.php") {
        $("#back").click(function(){
            window.location.assign("/login/");
        });
    }
});
