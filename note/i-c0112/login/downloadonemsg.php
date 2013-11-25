<?php
require_once('config.php');

if (!isset($_SESSION[$session])) {
    die("{\"error\": \"Plz login!\"}");
}

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
if (!$db) {
    $err = $db->connect_error;
    $db->close();
    die("{\"error\": \"$err\"}");
}

$sid = $_POST['sid'];
$query = "SELECT sid, userAcc, subject, content, timestamp FROM msg_board WHERE sid='$sid'";
$result = $db->query($query);
if (!$result) {
    $err = $db->error;
    $db->close();
    die("{\"error\": \"$err\"}");
}

// fetch at most 10 rows
if ( $arr = $result->fetch_assoc()) {
    $arr['timestamp'] = (int)($arr['timestamp']);
}

$result->close();
$db->close();
echo(json_encode(array($arr)));
?>
