<?php
require('config.php');

if (!isset($_SESSION[$session])) {
    die("{\"error\": \"Plz login!\"}");
}

$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
if (!$db) {
    $err = $db->connect_error;
    $db->close();
    die("{\"error\": \"$err\"}");
}

$query = "SELECT userAcc, subject, content, timestamp FROM msg_board ORDER BY timestamp";
$result = $db->query($query);
if (!$result) {
    $err = $db->error;
    $db->close();
    die("{\"error\": \"$err\"}");
}

$ret = Array();
$max = 10;
$cnt = 0;
// fetch at most 10 rows
while ( ($arr = $result->fetch_assoc() ) && $cnt < $max) {
    $ret[$cnt++] = $arr;
    // var_dump($arr);
    // echo '<br/>' . PHP_EOL;
}
echo(json_encode($ret));
?>