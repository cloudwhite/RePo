<?php
require("config.php");
if (!isset($_SESSION[$session])) {
    die ("Plz Login");
}
$userAcc = $_SESSION[$session];

$db = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$db) {
    $err = mysqli_connect_error($db);
    mysqli_close($db);
    die($err);
}

$subject = htmlspecialchars(htmlspecialchars_decode(($_POST["subject"])));
$content = htmlspecialchars(htmlspecialchars_decode(($_POST["content"])));
$t = time();
$sql = "INSERT INTO msg_board (userAcc, subject, content, timestamp) VALUES ('$userAcc', '$subject', '$content', '$t');";

if (!mysqli_query($db, $sql)) {
    $err = mysqli_error($db);
    mysqli_close($db);
    die($err);  
}

mysqli_close($db);
?>