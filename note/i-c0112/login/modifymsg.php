<?php
require_once("config.php");

if (!isset($_SESSION[$session])) {
    die('Plz login!');
}

$sid = $_POST['sid'];
$subject = htmlspecialchars(htmlspecialchars_decode(($_POST["subject"])));
$content = htmlspecialchars(htmlspecialchars_decode(($_POST["content"])));

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_errno) {
    die($mysqli->connect_error);
}

$sql = "SELECT userAcc FROM msg_board WHERE sid='$sid';";
$result = $mysqli->query($sql);
if ($mysqli->errno) {
    die($mysqli->error);
}
$row = $result->fetch_row() or die('Msg doesnt exist!');
if ($_SESSION[$session] != $row[0]) {
    die('You do NOT have the access to delete others msg!');
}

$sql = "UPDATE msg_board SET subject='$subject', content='$content' WHERE sid='$sid';";
$mysqli->query($sql);
if ($mysqli->errno) {
    die($mysqli->error);
}
$mysqli->close();
?>
