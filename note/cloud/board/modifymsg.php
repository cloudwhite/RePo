<?php
	session_start();
	$link = mysqli_connect("127.0.0.1" , "root" , "123456" , "board");
	//mysql_select_db("msg");
	mysql_query("set names utf8");
	if($_SESSION['account'] == null){
		header('location:login.html');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>modifyuser</title>
	</head>
	<body>
		<h2 style = "text-align:center;">please modify your msg</h2>
	</body>
</html>
<?php
	$msid = $_POST['msid'];
	$usersid = $_SESSION['sid'];
	$sql = "SELECT * FROM msg WHERE sid = '$msid' AND account = '$usersid'";
	if($result = mysqli_query($link,$sql)){
	$row = mysqli_fetch_array($result);
	echo "<form style = 'text-align:center;' action = 'modifyactionmsg.php' method = 'post' name = 'form'>
		<br>
		<input type = 'textarea' style = 'width: 500px; height: 100px' name = 'contant' value = ".$row['content'].">
		<br>
		<a href = 'lookmessage.php'>cancel</a>
		<input type = 'textarea' style = 'display : none;' value = ".$msid." name = 'msid' />
		<br>
		<input type='submit' value='modify' />
		</form>";}
	else {
		echo "error";
	}
		
?>