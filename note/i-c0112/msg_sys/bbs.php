<?php
$db = mysqli_connect("127.0.0.1", "root", "toor", "msg_sys");
if (!$db) {
	die(json_encode(array("Errno" => mysqli_connect_errno() ) ) );
}

$content = $_POST["userInput"];
$t = time();
$sql = "INSERT INTO `msg_sys`.`msg_board` (`like`, `access`, `subject`, `content`, `timestamp`) VALUES ('0', 'abcdefghij', 'dummy', '$content', '$t');";

if (!mysqli_query($db, $sql)){
	$errno = mysqli_errno($db);
	mysqli_close($db);
	die(json_encode(array("Errno" => $errno ) ) );
}

mysqli_close($db);
echo json_encode(array("timestamp" => $t));
?>